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
    echo "Continuing anyway - migrations will fail if DB is not ready"
fi

# Create storage link (ignore if exists)
echo ""
echo "=== Creating Storage Link ==="
php artisan storage:link || echo "  Storage link already exists (OK)"

# Run migrations
echo ""
echo "=== Running Migrations ==="
php artisan migrate --force || {
    echo "✗ Migration failed - check database connection"
    echo "Continuing anyway..."
}

# Clear caches
echo ""
echo "=== Clearing Caches ==="
php artisan cache:clear || true
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Cache config, routes, and views for production
echo ""
echo "=== Caching for Production ==="
php artisan config:cache || echo "Config cache failed"
php artisan route:cache || echo "Route cache failed"
php artisan view:cache || echo "View cache failed"

# Show application info
echo ""
echo "=== Application Info ==="
echo "Laravel Version: $(php artisan --version)"
echo "PHP Version: $(php -v | head -n 1)"
echo "Environment: $APP_ENV"
echo "Debug Mode: $APP_DEBUG"
echo "URL: $APP_URL"

# Test nginx config
echo ""
echo "=== Testing Nginx Configuration ==="
nginx -t || {
    echo "✗ Nginx configuration test failed"
    exit 1
}

# Start PHP-FPM in background
echo ""
echo "=== Starting PHP-FPM ==="
php-fpm -D || {
    echo "✗ PHP-FPM failed to start"
    exit 1
}

# Give PHP-FPM a moment to start
sleep 2

# Verify PHP-FPM is running
if ! pgrep -x php-fpm > /dev/null; then
    echo "✗ PHP-FPM is not running"
    exit 1
fi
echo "✓ PHP-FPM is running"

# Start Nginx in foreground
echo ""
echo "=== Starting Nginx ==="
echo "Application is ready! 🚀"
echo "Listening on port 8000"
echo "Health check: http://localhost:8000/health"
echo "================================"
exec nginx -g 'daemon off;'
