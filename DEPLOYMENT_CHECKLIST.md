# 🚀 Railway Deployment Checklist

Use this checklist to ensure a successful deployment to Railway.com

## ✅ Pre-Deployment (Local)

### Code Preparation
- [ ] All changes committed to Git
- [ ] `.env` file is NOT committed (in .gitignore)
- [ ] `composer.lock` is committed
- [ ] `public/build` assets are built (if using Vite)
- [ ] No hardcoded credentials in code

### Testing
- [ ] Application runs locally without errors
- [ ] Database migrations work: `php artisan migrate`
- [ ] Tests pass (if you have tests)
- [ ] No PHP errors in logs

### Configuration Files
- [ ] `Dockerfile` exists and is correct
- [ ] `railway.toml` exists
- [ ] `.railwayignore` exists
- [ ] `check-db.php` exists for testing

---

## 🔧 Railway Setup

### 1. Create Project
- [ ] Railway account created
- [ ] New project created from GitHub repo
- [ ] Repository connected to Railway

### 2. Add Database
- [ ] PostgreSQL service added to project
- [ ] Database is provisioning/ready (check status)
- [ ] `DATABASE_URL` variable is auto-generated

### 3. Configure Environment Variables

Go to: **Your Service → Variables**

#### Required Variables
- [ ] `APP_NAME` = "Brian Owaka Portfolio"
- [ ] `APP_ENV` = production
- [ ] `APP_DEBUG` = false
- [ ] `APP_KEY` = base64:A7gNDfsSaoz+FbEiPdM4m/CS3YkR46wrGHZGe3Wabgo=
- [ ] `APP_URL` = (will update after first deploy)
- [ ] `DB_CONNECTION` = pgsql
- [ ] `LOG_LEVEL` = error
- [ ] `SESSION_DRIVER` = database
- [ ] `CACHE_STORE` = database
- [ ] `QUEUE_CONNECTION` = database
- [ ] `FILESYSTEM_DISK` = public

#### Optional Variables (if needed)
- [ ] `AWS_ACCESS_KEY_ID` (for S3 storage)
- [ ] `AWS_SECRET_ACCESS_KEY` (for S3 storage)
- [ ] `AWS_BUCKET` (for S3 storage)
- [ ] `MAIL_MAILER` (for email)
- [ ] `MAIL_HOST` (for email)
- [ ] `MAIL_USERNAME` (for email)
- [ ] `MAIL_PASSWORD` (for email)

---

## 🚢 Deployment

### Initial Deploy
- [ ] Push code to GitHub: `git push origin main`
- [ ] Railway detects changes and starts build
- [ ] Build completes successfully (check logs)
- [ ] Deployment starts
- [ ] Deployment completes

### Verify Deployment
- [ ] Check deployment logs for errors
- [ ] Look for "Migration table created successfully"
- [ ] Look for "Migrated: ..." messages
- [ ] No database connection errors
- [ ] No storage link errors
- [ ] Application starts successfully

---

## 🔍 Post-Deployment Verification

### Application Health
- [ ] Visit Railway URL (e.g., https://your-app.railway.app)
- [ ] Homepage loads without errors
- [ ] No 500 errors
- [ ] No database connection errors
- [ ] CSS/JS assets load correctly

### Update Configuration
- [ ] Copy Railway URL from dashboard
- [ ] Update `APP_URL` environment variable with Railway URL
- [ ] Wait for automatic redeploy

### Database Check
- [ ] Database tables created
- [ ] Migrations ran successfully
- [ ] Can connect to database

### Functionality Tests
- [ ] Homepage loads
- [ ] About page loads
- [ ] Services page loads
- [ ] Portfolio page loads
- [ ] Contact form works
- [ ] Admin login page accessible (/admin)
- [ ] Admin dashboard accessible (after login)

---

## 🔐 Security Check

### Production Settings
- [ ] `APP_DEBUG` is false
- [ ] `APP_ENV` is production
- [ ] No sensitive data in logs
- [ ] HTTPS is enabled (Railway does this automatically)
- [ ] Strong `APP_KEY` is set

### Access Control
- [ ] Admin routes are protected
- [ ] Authentication works
- [ ] Password reset works (if configured)

---

## 📊 Performance & Monitoring

### Caching
- [ ] Config cached: `php artisan config:cache`
- [ ] Routes cached: `php artisan route:cache`
- [ ] Views cached: `php artisan view:cache`

### Monitoring
- [ ] Check Railway Metrics tab
- [ ] Monitor memory usage
- [ ] Monitor CPU usage
- [ ] Check response times

### Logs
- [ ] Application logs are accessible
- [ ] No critical errors in logs
- [ ] Log level is appropriate (error/warning)

---

## 💾 Backup & Recovery

### Database Backup
- [ ] Know how to backup database
- [ ] Test database restore process
- [ ] Consider automated backups (Railway Pro)

### Code Backup
- [ ] Code is in Git repository
- [ ] Repository has multiple branches
- [ ] Can rollback to previous version

---

## 🎯 Optional Enhancements

### Custom Domain
- [ ] Domain purchased
- [ ] DNS configured
- [ ] Domain added in Railway
- [ ] SSL certificate issued
- [ ] `APP_URL` updated with custom domain

### File Storage (S3)
- [ ] AWS S3 bucket created
- [ ] IAM user created with S3 access
- [ ] Access keys generated
- [ ] Environment variables set
- [ ] `FILESYSTEM_DISK` set to s3
- [ ] Test file uploads

### Email Configuration
- [ ] Email service chosen (Mailtrap, SendGrid, etc.)
- [ ] SMTP credentials obtained
- [ ] Environment variables set
- [ ] Test email sending

### Monitoring & Alerts
- [ ] Railway notifications enabled
- [ ] Error tracking setup (Sentry, Bugsnag)
- [ ] Uptime monitoring (UptimeRobot, Pingdom)

---

## 🐛 Troubleshooting

If something goes wrong:

### Check Logs
- [ ] Railway dashboard → Logs
- [ ] Look for error messages
- [ ] Check database connection errors

### Test Database
- [ ] Run `php check-db.php` locally
- [ ] Verify `DATABASE_URL` is set in Railway
- [ ] Check PostgreSQL service is running

### Common Issues
- [ ] Read `TROUBLESHOOTING.md`
- [ ] Check `RAILWAY_QUICK_FIX.md`
- [ ] Verify all environment variables

### Get Help
- [ ] Railway Discord: https://discord.gg/railway
- [ ] Railway Docs: https://docs.railway.app
- [ ] Laravel Forums: https://laracasts.com/discuss

---

## 📝 Documentation

### Keep Updated
- [ ] Document any custom configurations
- [ ] Update README with deployment info
- [ ] Document environment variables
- [ ] Keep deployment notes

### Team Communication
- [ ] Share Railway project access
- [ ] Document deployment process
- [ ] Share credentials securely
- [ ] Update team on changes

---

## ✨ Success Criteria

Your deployment is successful when:

✅ Application loads without errors
✅ Database is connected and migrations ran
✅ All pages are accessible
✅ Forms work correctly
✅ Admin panel is accessible
✅ No errors in logs
✅ Performance is acceptable
✅ HTTPS is working

---

## 🎉 Deployment Complete!

Once all items are checked:

1. ✅ Application is live
2. ✅ Database is working
3. ✅ All features functional
4. ✅ Monitoring in place
5. ✅ Team notified

**Congratulations! Your application is now live on Railway! 🚀**

---

## 📅 Maintenance Schedule

### Daily
- [ ] Check error logs
- [ ] Monitor performance metrics

### Weekly
- [ ] Review database size
- [ ] Check for security updates
- [ ] Review Railway usage/costs

### Monthly
- [ ] Update dependencies
- [ ] Review and optimize queries
- [ ] Check backup integrity
- [ ] Review security settings

---

## 📞 Support Contacts

- **Railway Support**: https://railway.app/help
- **Railway Discord**: https://discord.gg/railway
- **Laravel Support**: https://laravel.com/support
- **Project Documentation**: See `RAILWAY_DEPLOYMENT.md`

---

**Last Updated**: May 2026
**Version**: 1.0
**Platform**: Railway.com
