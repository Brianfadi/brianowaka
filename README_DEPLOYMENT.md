# Brian Owaka Portfolio - Deployment Guide

A Laravel-based portfolio website with admin dashboard, ready for deployment on Railway, Render, or any Docker-compatible platform.

## 🚀 Quick Deploy

### Railway (Recommended)
[![Deploy on Railway](https://railway.app/button.svg)](https://railway.app/new)

1. Click "Deploy on Railway"
2. Add PostgreSQL database
3. Set environment variables (see below)
4. Deploy!

### Render
1. Create new Web Service from GitHub
2. Add PostgreSQL database
3. Set environment variables
4. Deploy!

## 📋 Prerequisites

- PHP 8.4+
- PostgreSQL or MySQL
- Composer
- Node.js & NPM (for asset building)

## 🔧 Environment Variables

### Required Variables

```bash
# Application
APP_NAME="Brian Owaka Portfolio"
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:A7gNDfsSaoz+FbEiPdM4m/CS3YkR46wrGHZGe3Wabgo=
APP_URL=https://your-domain.com

# Database (Railway auto-provides DATABASE_URL)
DB_CONNECTION=pgsql

# Logging
LOG_CHANNEL=stack
LOG_LEVEL=error

# Session & Cache
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database

# Storage
FILESYSTEM_DISK=public
```

### Optional Variables

```bash
# AWS S3 (for persistent file storage)
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=your_key
AWS_SECRET_ACCESS_KEY=your_secret
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your_bucket

# Email
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS="noreply@brianowaka.com"
```

## 📦 Local Development

### 1. Clone Repository
```bash
git clone https://github.com/yourusername/brian-owaka-portfolio.git
cd brian-owaka-portfolio
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Configure Environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` with your local database credentials:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=brian_owaka
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Setup Database
```bash
php artisan migrate
php artisan db:seed  # Optional: seed with sample data
```

### 5. Build Assets
```bash
npm run build
```

### 6. Start Development Server
```bash
php artisan serve
```

Visit: http://localhost:8000

## 🐳 Docker Deployment

### Build Image
```bash
docker build -t brian-owaka-portfolio .
```

### Run Container
```bash
docker run -d \
  -p 8000:8000 \
  -e APP_KEY=base64:your_key \
  -e DB_CONNECTION=pgsql \
  -e DATABASE_URL=postgresql://user:pass@host:5432/db \
  brian-owaka-portfolio
```

## 🌐 Platform-Specific Guides

- **Railway**: See [RAILWAY_DEPLOYMENT.md](RAILWAY_DEPLOYMENT.md)
- **Render**: See [RENDER_DEPLOYMENT.md](RENDER_DEPLOYMENT.md) (if exists)
- **Quick Fix**: See [RAILWAY_QUICK_FIX.md](RAILWAY_QUICK_FIX.md)

## 🔍 Troubleshooting

See [TROUBLESHOOTING.md](TROUBLESHOOTING.md) for common issues and solutions.

### Quick Checks

**Test Database Connection:**
```bash
php check-db.php
```

**Clear All Caches:**
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

**View Logs:**
```bash
tail -f storage/logs/laravel.log
```

## 📁 Project Structure

```
.
├── app/                    # Application code
│   ├── Http/Controllers/   # Controllers
│   ├── Models/            # Eloquent models
│   └── View/Components/   # Blade components
├── config/                # Configuration files
├── database/              # Migrations & seeders
├── public/                # Public assets
├── resources/             # Views, CSS, JS
│   ├── views/            # Blade templates
│   └── css/              # Stylesheets
├── routes/                # Route definitions
├── storage/               # Logs, cache, uploads
├── docker/                # Docker configs
├── Dockerfile             # Docker build file
├── railway.toml           # Railway config
└── check-db.php          # DB connection tester
```

## 🎨 Features

- ✅ Portfolio showcase
- ✅ Admin dashboard
- ✅ Blog/Articles system
- ✅ Contact form
- ✅ Newsletter subscription
- ✅ Product/Service listings
- ✅ Testimonials
- ✅ Project gallery
- ✅ Skills & experience
- ✅ Dark mode support
- ✅ Responsive design
- ✅ SEO optimized

## 🔐 Admin Access

After deployment, create an admin user:

```bash
php artisan tinker
```

```php
User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => bcrypt('your-secure-password'),
]);
```

Access admin panel: `https://your-domain.com/admin`

## 🛠️ Maintenance

### Update Dependencies
```bash
composer update
npm update
```

### Run Migrations
```bash
php artisan migrate --force
```

### Clear & Cache
```bash
php artisan optimize:clear
php artisan optimize
```

### Backup Database
```bash
php artisan db:backup  # If backup package installed
# or
pg_dump database_name > backup.sql
```

## 📊 Performance Optimization

### Enable Caching
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Database Optimization
- Add indexes to frequently queried columns
- Use eager loading to prevent N+1 queries
- Enable query caching

### Asset Optimization
- Minify CSS/JS with Vite
- Optimize images before upload
- Use CDN for static assets
- Enable browser caching

## 🔒 Security

### Production Checklist
- [ ] Set `APP_DEBUG=false`
- [ ] Use strong `APP_KEY`
- [ ] Enable HTTPS
- [ ] Set secure session cookies
- [ ] Configure CORS properly
- [ ] Use environment variables for secrets
- [ ] Enable rate limiting
- [ ] Keep dependencies updated
- [ ] Regular security audits

### Security Headers
Add to nginx config:
```nginx
add_header X-Frame-Options "SAMEORIGIN";
add_header X-Content-Type-Options "nosniff";
add_header X-XSS-Protection "1; mode=block";
```

## 📝 License

This project is proprietary. All rights reserved.

## 👤 Author

**Brian Owaka**
- Website: https://brianowaka.com
- Email: contact@brianowaka.com

## 🤝 Support

For deployment issues:
1. Check [TROUBLESHOOTING.md](TROUBLESHOOTING.md)
2. Run `php check-db.php`
3. Check platform logs
4. Contact support

## 📚 Additional Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Railway Documentation](https://docs.railway.app)
- [Render Documentation](https://render.com/docs)
- [Docker Documentation](https://docs.docker.com)

---

**Last Updated**: May 2026
**Laravel Version**: 11.x
**PHP Version**: 8.4
