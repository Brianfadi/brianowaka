# Deployment Troubleshooting Guide

## Database Connection Errors

### Error: `php_network_getaddresses: getaddrinfo failed`

**Symptoms:**
```
SQLSTATE[HY000] [2002] php_network_getaddresses: getaddrinfo for dpg-d8a3q3r7uimc73a25tk0-a failed
```

**Causes:**
1. Wrong database hostname
2. Database service not running
3. Using credentials from different platform (e.g., Render on Railway)

**Solutions:**

#### For Railway:
1. Ensure PostgreSQL service is added to your project
2. Railway automatically provides `DATABASE_URL`
3. Set `DB_CONNECTION=pgsql` in environment variables
4. Don't manually set DB_HOST, DB_PORT, etc. (Railway handles this)

#### For Render:
1. Use internal connection string (ends with `-a`)
2. Set `DB_SSLMODE=require`
3. Verify hostname matches your Render PostgreSQL service

#### For Local Development:
1. Check if database server is running
2. Verify credentials in `.env` file
3. Test connection: `php check-db.php`

---

## Storage Link Errors

### Error: `The [public/storage] link already exists`

**Symptoms:**
```
ERROR  The [public/storage] link already exists.
```

**Cause:**
The storage link was created in a previous deployment and persists in the container.

**Solution:**
Already fixed in `Dockerfile` with `|| true` flag:
```bash
php artisan storage:link || true
```

**Manual Fix:**
```bash
rm public/storage
php artisan storage:link
```

---

## Migration Errors

### Error: `Base table or view not found`

**Symptoms:**
```
SQLSTATE[42S02]: Base table or view not found: 1146 Table 'database.users' doesn't exist
```

**Causes:**
1. Migrations haven't run
2. Database connection failed before migrations
3. Migration files are missing

**Solutions:**
1. Check deployment logs for migration output
2. Manually run: `php artisan migrate --force`
3. Verify all migration files exist in `database/migrations/`
4. Check database connection first: `php check-db.php`

---

## File Upload Issues

### Error: Files disappear after deployment

**Cause:**
Railway/Render use ephemeral storage. Files uploaded to `storage/app/public` are lost when container restarts.

**Solutions:**

#### Option 1: AWS S3 (Recommended)
```bash
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=your_key
AWS_SECRET_ACCESS_KEY=your_secret
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your_bucket
AWS_URL=https://your_bucket.s3.amazonaws.com
```

#### Option 2: Cloudflare R2 (S3-compatible)
```bash
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=your_r2_key
AWS_SECRET_ACCESS_KEY=your_r2_secret
AWS_DEFAULT_REGION=auto
AWS_BUCKET=your_bucket
AWS_ENDPOINT=https://your_account.r2.cloudflarestorage.com
AWS_URL=https://your_bucket.your_account.r2.cloudflarestorage.com
AWS_USE_PATH_STYLE_ENDPOINT=false
```

#### Option 3: Railway Volumes (Persistent Storage)
1. In Railway dashboard, go to your service
2. Click "Settings" → "Volumes"
3. Add volume: `/var/www/storage/app/public`

---

## Environment Variable Issues

### Error: `APP_KEY` not set

**Symptoms:**
```
RuntimeException: No application encryption key has been specified.
```

**Solution:**
1. Generate key locally: `php artisan key:generate`
2. Copy the key from `.env` file
3. Set in Railway/Render: `APP_KEY=base64:...`

---

## Cache Issues

### Error: Cached config/routes causing issues

**Symptoms:**
- Changes not reflecting
- Old routes still active
- Config values not updating

**Solutions:**
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

**For Production:**
After clearing, rebuild caches:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## Permission Errors

### Error: `Permission denied` for storage/logs

**Symptoms:**
```
UnexpectedValueException: The stream or file "storage/logs/laravel.log" could not be opened
```

**Solution:**
Already handled in `Dockerfile`:
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

**Manual Fix:**
```bash
chmod -R 775 storage bootstrap/cache
```

---

## SSL/TLS Errors

### Error: `SSL connection required`

**Symptoms:**
```
SQLSTATE[08006]: Connection failure: SSL connection is required
```

**Solution:**
Add to environment variables:
```bash
DB_SSLMODE=require  # For PostgreSQL
# or
MYSQL_ATTR_SSL_CA=/path/to/ca-cert.pem  # For MySQL
```

---

## Memory Errors

### Error: `Allowed memory size exhausted`

**Symptoms:**
```
Fatal error: Allowed memory size of 134217728 bytes exhausted
```

**Solutions:**

#### Increase PHP memory limit:
In `Dockerfile`, add:
```dockerfile
RUN echo "memory_limit = 512M" > /usr/local/etc/php/conf.d/memory-limit.ini
```

#### Optimize queries:
- Use pagination for large datasets
- Add database indexes
- Use eager loading to prevent N+1 queries

---

## Port Binding Errors

### Error: `Address already in use`

**Symptoms:**
```
nginx: [emerg] bind() to 0.0.0.0:8000 failed (98: Address already in use)
```

**Solution:**
Railway/Render automatically assign ports. Update nginx config to use `$PORT`:
```nginx
listen ${PORT} default_server;
```

---

## Debugging Tips

### 1. Check Logs

**Railway:**
```bash
railway logs
# or in dashboard: Your Service → Logs
```

**Render:**
Dashboard → Your Service → Logs

**Local:**
```bash
tail -f storage/logs/laravel.log
```

### 2. Enable Debug Mode (Temporarily)

```bash
APP_DEBUG=true
LOG_LEVEL=debug
```

**⚠️ Warning:** Never leave debug mode on in production!

### 3. Test Database Connection

```bash
php check-db.php
```

### 4. Verify Environment Variables

```bash
php artisan config:show
php artisan env
```

### 5. Check Service Health

**Railway:**
Dashboard → Your Service → Metrics

**Render:**
Dashboard → Your Service → Metrics

---

## Common Deployment Checklist

Before deploying, verify:

- [ ] `.env` variables are set in platform dashboard
- [ ] `APP_KEY` is generated and set
- [ ] Database service is running
- [ ] `DB_CONNECTION` matches database type (pgsql/mysql)
- [ ] `APP_URL` matches your deployment URL
- [ ] Storage is configured (S3 or volumes)
- [ ] Migrations are in `database/migrations/`
- [ ] `composer.lock` is committed
- [ ] `public/build` assets are built (if using Vite)

---

## Getting Help

### Railway
- Docs: https://docs.railway.app
- Discord: https://discord.gg/railway
- Status: https://status.railway.app

### Render
- Docs: https://render.com/docs
- Community: https://community.render.com
- Status: https://status.render.com

### Laravel
- Docs: https://laravel.com/docs
- Forums: https://laracasts.com/discuss
- Discord: https://discord.gg/laravel

---

## Quick Reference

### Railway Environment Variables
```bash
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:...
DB_CONNECTION=pgsql
# DATABASE_URL is auto-provided
```

### Render Environment Variables
```bash
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:...
DB_CONNECTION=pgsql
DB_HOST=dpg-xxx-a
DB_PORT=5432
DB_SSLMODE=require
```

### Essential Artisan Commands
```bash
php artisan migrate --force
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
```
