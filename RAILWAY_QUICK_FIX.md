# Railway Deployment - Quick Fix

## Your Current Error

```
SQLSTATE[HY000] [2002] php_network_getaddresses: getaddrinfo for dpg-d8a3q3r7uimc73a25tk0-a failed
```

**Problem**: You're using Render.com database credentials on Railway.com

## Quick Fix (5 minutes)

### 1. Add PostgreSQL to Railway

In your Railway project:
- Click **"+ New"**
- Select **"Database"** → **"PostgreSQL"**
- Wait for it to provision (30 seconds)

### 2. Set Environment Variables

Go to your app service → **"Variables"** tab:

**Copy these exactly:**

```bash
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:A7gNDfsSaoz+FbEiPdM4m/CS3YkR46wrGHZGe3Wabgo=

DB_CONNECTION=pgsql

LOG_LEVEL=error
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
FILESYSTEM_DISK=public
```

**Important**: 
- Railway automatically provides `DATABASE_URL` - you don't need to set DB_HOST, DB_PORT, etc.
- Update `APP_URL` after deployment with your Railway URL

### 3. Redeploy

Railway will automatically redeploy. Check logs for success.

## Verify It Works

After deployment, check logs for:
```
✓ Migration table created successfully
✓ Migrating: ...
```

## Still Having Issues?

### Check Database Connection

Run this in Railway CLI or add to your deployment:
```bash
php check-db.php
```

### Common Issues

**Issue**: "Connection refused"
- **Fix**: Ensure PostgreSQL service is running in Railway

**Issue**: "Access denied"
- **Fix**: Railway sets DATABASE_URL automatically, don't override it

**Issue**: "Table not found"
- **Fix**: Migrations didn't run. Check deployment logs

**Issue**: "Storage link exists"
- **Fix**: Already handled in updated Dockerfile

## Need Help?

1. Check Railway logs: Dashboard → Your Service → "Logs"
2. Verify DATABASE_URL exists: Dashboard → Your Service → "Variables"
3. Ensure PostgreSQL is healthy: Dashboard → PostgreSQL service → "Metrics"

## Files Updated

✓ `Dockerfile` - Fixed storage link error
✓ `config/database.php` - Added DATABASE_URL support
✓ `.env.example` - Updated for Railway
✓ `RAILWAY_DEPLOYMENT.md` - Full deployment guide
✓ `check-db.php` - Database connection checker

## Next Steps

1. Push these changes to GitHub
2. Railway will auto-deploy
3. Update APP_URL with your Railway domain
4. Test your application

## Production Checklist

- [ ] PostgreSQL database added
- [ ] Environment variables set
- [ ] APP_URL updated with Railway domain
- [ ] Migrations ran successfully
- [ ] Application loads without errors
- [ ] File uploads work (or S3 configured)
- [ ] Email sending configured (optional)

---

**Need the old Render.com setup?** Keep the old credentials in a separate file, don't mix them with Railway config.
