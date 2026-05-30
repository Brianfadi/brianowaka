#!/bin/bash

# Railway Startup Script
# This script runs when your container starts on Railway

set -e  # Exit on error

echo "=== Railway Deployment Starting ==="
echo "Environment: $APP_ENV"
echo "Database: $DB_CONNECTION"
echo ""

# Function to check if database is ready
wait_for_db() {
    echo "Waiting for database to be ready..."
    max_attempts=30
    attempt=0
    
    while [ $attempt -lt $max_attempts ]; do
        if php artisan db:show 2>/dev/null; then
            echo "✓ Database is ready!"
            return 0
        fi
        attempt=$((attempt + 1))
        echo "  Attempt $attempt/$max_attempts - waiting..."
        sleep 2
    done
    
    echo "✗ Database connection timeout"
    return 1
}

# Check database connection
echo "=== Checking Database Connection ==="
if wait_for_db; then
    echo "✓ Database connection successful"
else
    echo "✗ Database connection failed"
    echo "Checking configuration..."
    php check-db.php || true
    exit 1
fi

# Create storage link (ignore if exists)
echo ""
echo "=== Creating Storage Link ==="
php artisan storage:link || echo "  Storage link already exists (OK)"

# Run migrations
echo ""
echo "=== Running Migrations ==="
php artisan migrate --force || {
    echo "✗ Migration failed"
    exit 1
}

# Clear caches
echo ""
echo "=== Clearing Caches ==="
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Cache config, routes, and views for production
echo ""
echo "=== Caching for Production ==="
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Show application info
echo ""
echo "=== Application Info ==="
echo "Laravel Version: $(php artisan --version)"
echo "PHP Version: $(php -v | head -n 1)"
echo "Environment: $APP_ENV"
echo "Debug Mode: $APP_DEBUG"
echo "URL: $APP_URL"

# Start PHP-FPM in background
echo ""
echo "=== Starting PHP-FPM ==="
php-fpm -D

# Start Nginx in foreground
echo ""
echo "=== Starting Nginx ==="
echo "Application is ready! 🚀"
echo "================================"
nginx -g 'daemon off;'
