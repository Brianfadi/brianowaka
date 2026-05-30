# Railway Deployment Guide

## Prerequisites

1. Railway account: https://railway.app
2. Railway CLI (optional): `npm i -g @railway/cli`

## Step 1: Create Railway Project

1. Go to https://railway.app/new
2. Click "Deploy from GitHub repo"
3. Select your repository
4. Railway will automatically detect the Dockerfile

## Step 2: Add PostgreSQL Database

1. In your Railway project, click "+ New"
2. Select "Database" → "PostgreSQL"
3. Railway will automatically create a `DATABASE_URL` environment variable

## Step 3: Configure Environment Variables

In Railway dashboard, go to your service → "Variables" tab and add:

### Required Variables

```bash
APP_NAME="Brian Owaka Portfolio"
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:A7gNDfsSaoz+FbEiPdM4m/CS3YkR46wrGHZGe3Wabgo=
APP_URL=https://your-app.railway.app

# Database - Railway provides DATABASE_URL automatically
# But you can also set these individually from your PostgreSQL service:
DB_CONNECTION=pgsql
# DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD 
# are automatically extracted from DATABASE_URL

LOG_CHANNEL=stack
LOG_LEVEL=error

SESSION_DRIVER=database
SESSION_LIFETIME=120
CACHE_STORE=database
QUEUE_CONNECTION=database
FILESYSTEM_DISK=public

BCRYPT_ROUNDS=12
```

### Optional: AWS S3 for File Storage (Recommended for Production)

```bash
# Without S3, uploaded files will be lost when container restarts
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=your_access_key
AWS_SECRET_ACCESS_KEY=your_secret_key
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your_bucket_name
AWS_URL=https://your_bucket.s3.amazonaws.com
```

### Optional: Email Configuration

```bash
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS="noreply@brianowaka.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## Step 4: Update APP_URL

After deployment, Railway will give you a URL like `https://your-app.railway.app`

Update the `APP_URL` environment variable with your actual Railway URL.

## Step 5: Deploy

1. Push your code to GitHub
2. Railway will automatically build and deploy
3. Check the deployment logs for any errors

## Troubleshooting

### Database Connection Issues

If you see `SQLSTATE[HY000] [2002]` errors:

1. Verify PostgreSQL service is running in Railway
2. Check that `DATABASE_URL` is set (Railway does this automatically)
3. Ensure `DB_CONNECTION=pgsql` is set

### Storage Link Errors

The error "The [public/storage] link already exists" is now handled automatically with `|| true` in the Dockerfile.

### Migration Errors

If migrations fail:
1. Check database credentials
2. Ensure PostgreSQL service is healthy
3. Check logs: `railway logs` (if using CLI)

### File Upload Issues

If file uploads don't persist:
1. Set up AWS S3 or Cloudflare R2
2. Update `FILESYSTEM_DISK=s3`
3. Configure AWS credentials

## Custom Domain (Optional)

1. In Railway dashboard, go to your service
2. Click "Settings" → "Domains"
3. Click "Generate Domain" or add your custom domain
4. Update `APP_URL` environment variable

## Database Backups

Railway Pro plan includes automatic backups. For free tier:
1. Use Railway CLI: `railway run pg_dump > backup.sql`
2. Or set up a cron job to backup to S3

## Monitoring

- View logs: Railway dashboard → your service → "Logs"
- View metrics: Railway dashboard → your service → "Metrics"
- Set up alerts: Railway dashboard → "Settings" → "Notifications"

## Cost Optimization

Railway free tier includes:
- $5 free credit per month
- 500 hours of usage
- 1GB RAM per service

To optimize:
- Use efficient queries
- Enable caching
- Optimize images before upload
- Use CDN for static assets

## Support

- Railway Docs: https://docs.railway.app
- Railway Discord: https://discord.gg/railway
- Railway Status: https://status.railway.app
