# 🚀 Deploy Now - Final Fix

## What's Been Fixed

### Issue
Railway healthcheck keeps failing even with `/health` endpoint.

### Root Causes Found
1. Nginx config was in wrong location (`sites-available` vs `conf.d`)
2. Startup command was too complex and failing silently
3. No visibility into what's actually happening during startup

### Solutions Applied

1. **Fixed Nginx Configuration Location**
   - Moved from `/etc/nginx/sites-available/` to `/etc/nginx/conf.d/`
   - Removed conflicting default site config

2. **Created Dedicated Startup Script** (`start.sh`)
   - Clear logging of each step
   - Proper error handling
   - Verifies PHP-FPM is running before starting Nginx
   - Tests Nginx config before starting

3. **Simplified Dockerfile**
   - Uses dedicated startup script
   - Cleaner CMD instruction
   - Better layer caching

## Deploy Instructions

### 1. Commit and Push

```bash
git add .
git commit -m "Fix nginx config location and improve startup"
git push
```

### 2. Watch Railway Logs

In Railway Dashboard → Your Service → "Logs", you should see:

```
=== Starting Application ===
Creating storage link...
Running migrations...
Caching configuration...
Starting PHP-FPM...
Waiting for PHP-FPM to be ready...
✓ PHP-FPM is running (PID: 21)
Testing nginx configuration...
nginx: configuration file /etc/nginx/nginx.conf test is successful
Starting nginx...
Application should be available on port 8000
Health endpoint: http://localhost:8000/health
=== Startup Complete ===

==================== Starting Healthcheck ====================
Path: /health
Attempt #1 succeeded ✓
```

### 3. If Healthcheck Still Fails

Open Railway Shell and run:

```bash
# Check if services are running
ps aux | grep php-fpm
ps aux | grep nginx

# Test health endpoint
curl http://localhost:8000/health

# Check nginx error log
cat /var/log/nginx/error.log

# Check nginx config
nginx -t

# Check what's listening on port 8000
netstat -tlnp | grep 8000
```

## What Changed

| File | Change | Purpose |
|------|--------|---------|
| `Dockerfile` | Nginx config location | Fix config not being loaded |
| `Dockerfile` | Use start.sh script | Better startup logging |
| `start.sh` | New file | Dedicated startup with logging |
| `docker/nginx.conf` | Added logging | Debug issues |

## Expected Timeline

```
0:00 - Push to GitHub
0:30 - Railway starts build
2:00 - Build completes
2:30 - Container starts
2:35 - start.sh runs
2:40 - PHP-FPM starts
2:43 - Nginx starts
2:45 - Healthcheck runs
2:46 - ✓ Healthcheck passes
2:47 - 🎉 Deployment successful!
```

## Debugging Tips

### Check Startup Logs

The new `start.sh` script logs every step. Look for:

- ✓ "PHP-FPM is running" - Good!
- ✗ "PHP-FPM failed to start" - Check PHP errors
- "nginx: configuration file test is successful" - Good!
- "nginx: configuration file test failed" - Check nginx.conf

### Common Issues

**"nginx: configuration file test failed"**
```bash
# Check syntax
nginx -t

# Check if config file exists
ls -la /etc/nginx/conf.d/default.conf

# View config
cat /etc/nginx/conf.d/default.conf
```

**"PHP-FPM failed to start"**
```bash
# Check PHP-FPM logs
cat /var/log/php-fpm.log

# Try starting manually
php-fpm -F
```

**"Connection refused on port 8000"**
```bash
# Check what's listening
netstat -tlnp

# Check nginx status
nginx -t
ps aux | grep nginx
```

## Alternative: Disable Healthcheck Temporarily

If you need to see what's happening, temporarily disable healthcheck in `railway.toml`:

```toml
[deploy]
healthcheckPath = ""  # Disable healthcheck
```

This will let the container stay running so you can debug. **Don't forget to re-enable it!**

## Success Criteria

✅ Build completes
✅ Container starts
✅ Startup logs show all steps
✅ PHP-FPM is running
✅ Nginx config test passes
✅ Nginx starts
✅ `/health` endpoint responds
✅ Healthcheck passes
✅ Deployment successful

## Next Steps After Success

1. **Update APP_URL** with your Railway domain
2. **Create admin user** (see README_DEPLOYMENT.md)
3. **Test the application**
4. **Set up S3 storage** (optional)
5. **Configure email** (optional)

## Still Having Issues?

1. Share the Railway logs (especially the startup section)
2. Run the debug commands in Railway Shell
3. Check if DATABASE_URL is set correctly
4. Verify PostgreSQL service is running

---

**Ready? Let's deploy!**

```bash
git add .
git commit -m "Fix nginx and startup configuration"
git push
```

Then watch the Railway logs for success! 🚀
