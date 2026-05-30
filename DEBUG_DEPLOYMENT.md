# 🔍 Debug Deployment - No Healthcheck

## What Changed

I've **temporarily disabled the healthcheck** in `railway.toml` so the container will stay running even if it's not responding. This will let us see the actual startup logs and debug what's going wrong.

## Deploy Now

```bash
git add .
git commit -m "Disable healthcheck temporarily for debugging"
git push
```

## What to Look For

### In Railway Logs

After deployment, go to **Railway Dashboard → Your Service → Logs**

You should now see the full startup output:

```
=== Starting Application ===
Time: Fri May 30 11:52:00 UTC 2026
Working directory: /var/www
User: root

Creating storage link...
[output here]

Running migrations...
[migration output here]

Caching configuration...
[cache output here]

Starting PHP-FPM...
[PHP-FPM output here]

✓ PHP-FPM is running (PID: 21)

Testing nginx configuration...
[nginx test output here]

Starting nginx...
=== Startup Complete ===
```

### Look for Errors

**Common error patterns:**

1. **"Permission denied"** - File permission issues
2. **"Connection refused"** - Database connection issues
3. **"nginx: configuration file test failed"** - Nginx config syntax error
4. **"PHP Fatal error"** - PHP code or extension issues
5. **"Address already in use"** - Port conflict

## Once Container is Running

### Test Manually

Open Railway Shell (Dashboard → Your Service → Shell icon) and run:

```bash
# Check if services are running
ps aux | grep php-fpm
ps aux | grep nginx

# Test the health endpoint
curl http://localhost:8000/health

# Test the main application
curl http://localhost:8000/

# Check what's listening on port 8000
netstat -tlnp | grep 8000

# Check nginx error log
tail -f /var/log/nginx/error.log

# Check nginx access log
tail -f /var/log/nginx/access.log
```

### Check Nginx Config

```bash
# Test nginx config
nginx -t

# View the config
cat /etc/nginx/conf.d/default.conf

# Check if config file exists
ls -la /etc/nginx/conf.d/

# Check nginx main config
cat /etc/nginx/nginx.conf | grep include
```

### Check PHP-FPM

```bash
# Check if PHP-FPM is running
pgrep php-fpm

# Check PHP-FPM config
php-fpm -t

# Try accessing PHP through nginx
curl http://localhost:8000/
```

## Common Issues & Fixes

### Issue 1: Nginx Not Starting

**Symptoms:**
```
nginx: [emerg] bind() to 0.0.0.0:8000 failed
```

**Fix:**
Something else is using port 8000. Check with:
```bash
netstat -tlnp | grep 8000
kill <PID>
```

### Issue 2: PHP-FPM Not Running

**Symptoms:**
```
✗ PHP-FPM failed to start!
```

**Fix:**
Check PHP-FPM logs:
```bash
php-fpm -F  # Run in foreground to see errors
```

### Issue 3: Database Connection Failed

**Symptoms:**
```
SQLSTATE[HY000] [2002] Connection refused
```

**Fix:**
Check environment variables:
```bash
echo $DATABASE_URL
echo $DB_CONNECTION
echo $DB_HOST
```

Verify PostgreSQL service is running in Railway dashboard.

### Issue 4: Nginx Config Not Found

**Symptoms:**
```
nginx: [emerg] open() "/etc/nginx/conf.d/default.conf" failed
```

**Fix:**
The file wasn't copied. Check Dockerfile COPY command.

### Issue 5: Permission Denied

**Symptoms:**
```
Permission denied: /var/www/storage/logs/laravel.log
```

**Fix:**
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

## Next Steps Based on Findings

### If Everything Works

If you can successfully `curl http://localhost:8000/health` and get "healthy", then:

1. **Re-enable healthcheck** in `railway.toml`:
   ```toml
   [deploy]
   healthcheckPath = "/health"
   healthcheckTimeout = 300
   ```

2. Commit and push again

### If Nginx Isn't Starting

1. Check the nginx config syntax
2. Verify the config file location
3. Check for port conflicts

### If PHP-FPM Isn't Starting

1. Check for PHP syntax errors
2. Verify PHP extensions are installed
3. Check memory limits

### If Database Connection Fails

1. Verify `DATABASE_URL` is set in Railway
2. Check PostgreSQL service is running
3. Test connection with `php check-db.php`

## Share Your Findings

After deployment, share:

1. **The startup logs** (from Railway Logs)
2. **Output of `curl http://localhost:8000/health`** (from Railway Shell)
3. **Output of `ps aux | grep nginx`** (from Railway Shell)
4. **Any error messages** you see

This will help identify the exact issue.

## Quick Commands Reference

```bash
# Service status
ps aux | grep php-fpm
ps aux | grep nginx

# Test endpoints
curl http://localhost:8000/health
curl http://localhost:8000/

# Check ports
netstat -tlnp

# View logs
tail -f /var/log/nginx/error.log
tail -f /var/log/nginx/access.log
tail -f storage/logs/laravel.log

# Test configs
nginx -t
php-fpm -t

# Restart services (if needed)
killall nginx && nginx
killall php-fpm && php-fpm -D
```

## Expected Successful Output

When everything works, you should see:

```bash
$ curl http://localhost:8000/health
healthy

$ curl http://localhost:8000/
<!DOCTYPE html>
<html>
... (HTML content)

$ ps aux | grep nginx
root  21  nginx: master process
www-data  22  nginx: worker process

$ ps aux | grep php-fpm
root  15  php-fpm: master process
www-data  16  php-fpm: pool www
www-data  17  php-fpm: pool www
```

---

**Deploy now and let's see what the actual error is!**

```bash
git add .
git commit -m "Disable healthcheck for debugging"
git push
```

Then check Railway Logs for the full startup output.
