#!/bin/bash
set -e

echo "=== Starting Application ==="
echo "Time: $(date)"
echo "Working directory: $(pwd)"
echo ""

# Storage link
echo "Creating storage link..."
php artisan storage:link 2>/dev/null || echo "Storage link already exists"

# Migrations
echo "Running migrations..."
php artisan migrate --force || echo "Migration failed but continuing..."

# Cache
echo "Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP-FPM
echo "Starting PHP-FPM..."
php-fpm -D

# Wait for PHP-FPM
echo "Waiting for PHP-FPM to be ready..."
sleep 3

# Check PHP-FPM
if pgrep php-fpm > /dev/null; then
    echo "✓ PHP-FPM is running (PID: $(pgrep php-fpm | head -1))"
else
    echo "✗ PHP-FPM failed to start!"
    exit 1
fi

# Test nginx config
echo "Testing nginx configuration..."
nginx -t

# Start nginx
echo "Starting nginx..."
echo "Application should be available on port 8000"
echo "Health endpoint: http://localhost:8000/health"
echo "=== Startup Complete ==="

exec nginx -g 'daemon off;'
