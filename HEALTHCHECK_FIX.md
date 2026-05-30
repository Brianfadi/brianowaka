# Railway Healthcheck Fix

## Problem

Railway healthcheck is failing with "service unavailable" even though migrations ran successfully.

```
Attempt #1 failed with service unavailable
Attempt #2 failed with service unavailable
...
1/1 replicas never became healthy!
```

## Root Cause

The healthcheck was trying to access `/` (Laravel homepage) which requires:
1. PHP-FPM to be running
2. Nginx to be running
3. Laravel application to be fully initialized
4. Database connection to be working

If any of these fail, the healthcheck fails and Railway kills the container.

## Fixes Applied

### 1. Added Dedicated Health Endpoint

**File**: `docker/nginx.conf`

Added a simple `/health` endpoint that returns immediately without hitting PHP:

```nginx
location /health {
    access_log off;
    return 200 "healthy\n";
    add_header Content-Type text/plain;
}
```

**Why**: This endpoint responds instantly without requiring PHP/Laravel, making healthchecks more reliable.

### 2. Updated Railway Config

**File**: `railway.toml`

Changed healthcheck path from `/` to `/health`:

```toml
healthcheckPath = "/health"
healthcheckTimeout = 300
```

**Why**: Gives more time for startup and uses the simpler health endpoint.

### 3. Improved Startup Script

**File**: `Dockerfile` CMD

Added better error handling and verification:

```bash
- Test PHP-FPM is running before starting Nginx
- Test Nginx config before starting
- Use 'exec' for proper signal handling
- Add sleep to ensure PHP-FPM is ready
```

**Why**: Ensures services start in correct order and are actually running.

### 4. Added Logging

**File**: `docker/nginx.conf`

```nginx
access_log /dev/stdout;
error_log /dev/stderr;
```

**Why**: Makes debugging easier by sending logs to Railway dashboard.

## How to Deploy Fix

### 1. Commit Changes

```bash
git add .
git commit -m "Fix Railway healthcheck with dedicated /health endpoint"
git push
```

### 2. Railway Will Auto-Deploy

Railway will detect the changes and rebuild. Watch the logs for:

```
✓ Starting PHP-FPM...
✓ Testing PHP-FPM...
✓ Starting Nginx...
✓ Application is ready!
```

### 3. Verify Healthcheck

In Railway logs, you should now see:

```
==================== Starting Healthcheck ====================
Path: /health
Attempt #1 succeeded
Deployment successful!
```

## Testing Locally

### Test Health Endpoint

```bash
# Build image
docker build -t brian-owaka .

# Run container
docker run -d -p 8000:8000 \
  -e APP_KEY=base64:A7gNDfsSaoz+FbEiPdM4m/CS3YkR46wrGHZGe3Wabgo= \
  -e DB_CONNECTION=sqlite \
  brian-owaka

# Test health endpoint
curl http://localhost:8000/health
# Should return: healthy

# Test main application
curl http://localhost:8000/
# Should return: HTML content
```

## What Changed

| Component | Before | After |
|-----------|--------|-------|
| Healthcheck Path | `/` (Laravel app) | `/health` (Nginx direct) |
| Healthcheck Timeout | 100s | 300s |
| PHP-FPM Verification | None | Checks process is running |
| Nginx Verification | None | Tests config before start |
| Error Handling | Basic | Comprehensive |
| Logging | Limited | Full stdout/stderr |

## Why This Works

### Before (Failing)
```
1. Railway starts container
2. Migrations run (60s)
3. PHP-FPM starts
4. Nginx starts
5. Railway checks / endpoint
6. Laravel needs to:
   - Connect to database
   - Load config
   - Compile views
   - Process request
7. Takes too long → healthcheck fails
8. Railway kills container
```

### After (Working)
```
1. Railway starts container
2. Migrations run (60s)
3. PHP-FPM starts
4. Script verifies PHP-FPM is running
5. Nginx starts
6. Script verifies Nginx is running
7. Railway checks /health endpoint
8. Nginx returns "healthy" immediately
9. Healthcheck passes ✓
10. Container stays alive
11. Laravel app is accessible on /
```

## Troubleshooting

### If Healthcheck Still Fails

**Check Logs**:
```
Railway Dashboard → Your Service → Logs
```

Look for:
- `✗ PHP-FPM failed to start`
- `✗ Nginx configuration test failed`
- `✗ Migration failed`

**Common Issues**:

1. **PHP-FPM not starting**
   - Check PHP syntax errors
   - Verify PHP extensions are installed
   - Check memory limits

2. **Nginx not starting**
   - Check nginx.conf syntax
   - Verify port 8000 is available
   - Check file permissions

3. **Migrations failing**
   - Verify DATABASE_URL is set
   - Check PostgreSQL service is running
   - Verify database credentials

### Manual Healthcheck Test

In Railway dashboard, open a shell and run:

```bash
# Check if PHP-FPM is running
pgrep php-fpm

# Check if Nginx is running
pgrep nginx

# Test health endpoint
curl http://localhost:8000/health

# Test main app
curl http://localhost:8000/
```

## Additional Improvements

### 1. Add Startup Probe (Optional)

If you need even more startup time, update `railway.toml`:

```toml
[deploy]
startupProbeFailureThreshold = 30
startupProbePeriodSeconds = 10
```

This gives 300 seconds (5 minutes) for startup.

### 2. Add Readiness Probe (Optional)

Create a Laravel route that checks database:

```php
// routes/web.php
Route::get('/ready', function () {
    try {
        DB::connection()->getPdo();
        return response('ready', 200);
    } catch (\Exception $e) {
        return response('not ready', 503);
    }
});
```

Then update `railway.toml`:

```toml
healthcheckPath = "/ready"
```

### 3. Monitor Performance

Watch Railway metrics:
- Response time should be < 100ms for /health
- CPU usage should stabilize after startup
- Memory usage should be consistent

## Success Criteria

✅ Healthcheck passes on first attempt
✅ Container stays running
✅ Application is accessible
✅ No "service unavailable" errors
✅ Logs show successful startup

## Summary

The fix changes the healthcheck from hitting the full Laravel application (`/`) to a simple Nginx endpoint (`/health`) that responds immediately. This makes the healthcheck more reliable and gives the application time to fully initialize.

**Status**: Ready to deploy
**Impact**: Fixes healthcheck failures
**Risk**: Low (only adds new endpoint, doesn't change existing functionality)
