#!/bin/bash

echo "=== Starting Application ==="
echo "Time: $(date)"
echo "Working directory: $(pwd)"
echo "User: $(whoami)"
echo ""

# Storage link
echo "Creating storage link..."
php artisan storage:link 2>&1 || echo "Storage link already exists or failed (continuing...)"

# Migrations
echo ""
echo "Running migrations..."
php artisan migrate --force 2>&1 || echo "Migration failed (continuing...)"

# Cache
echo ""
echo "Caching configuration..."
php artisan config:cache 2>&1 || echo "Config cache failed (continuing...)"
php artisan route:cache 2>&1 || echo "Route cache failed (continuing...)"
php artisan view:cache 2>&1 || echo "View cache failed (continuing...)"

# Start PHP-FPM
echo ""
echo "Starting PHP-FPM..."
php-fpm -D 2>&1

# Wait for PHP-FPM
echo "Waiting for PHP-FPM to be ready..."
sleep 3

# Check PHP-FPM
echo "Checking PHP-FPM status..."
if pgrep php-fpm > /dev/null; then
    echo "✓ PHP-FPM is running (PID: $(pgrep php-fpm | head -1))"
else
    echo "✗ PHP-FPM failed to start!"
    echo "Trying to start PHP-FPM in foreground for debugging..."
    php-fpm -F &
    sleep 2
fi

# Test nginx config
echo ""
echo "Testing nginx configuration..."
nginx -t 2>&1

# Check if nginx config exists
echo "Checking nginx config files..."
ls -la /etc/nginx/conf.d/ 2>&1 || echo "conf.d directory not found"
ls -la /etc/nginx/nginx.conf 2>&1 || echo "nginx.conf not found"

# Start nginx
echo ""
echo "Starting nginx..."
echo "Application should be available on port 8000"
echo "Health endpoint: http://localhost:8000/health"
echo "=== Startup Complete ==="
echo ""

exec nginx -g 'daemon off;'
