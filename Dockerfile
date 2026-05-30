FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    nginx \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Note: Vite assets are pre-built and committed to public/build
# This ensures consistent builds on Render's free tier

# Set correct permissions
RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && mkdir -p public/storage \
    && chmod -R 775 public/storage \
    && chown -R www-data:www-data public/storage

# Copy nginx config
COPY docker/nginx.conf /etc/nginx/sites-available/default

# Copy startup script
COPY railway-start.sh /usr/local/bin/railway-start.sh
RUN chmod +x /usr/local/bin/railway-start.sh

# Expose port
EXPOSE 8000

# Health check
HEALTHCHECK --interval=30s --timeout=10s --start-period=60s --retries=3 \
    CMD curl -f http://localhost:8000/health || exit 1

# At runtime: use improved startup with better error handling
CMD ["/bin/sh", "-c", "set -e && echo 'Starting application...' && php artisan storage:link 2>/dev/null || true && echo 'Running migrations...' && php artisan migrate --force && echo 'Clearing caches...' && php artisan cache:clear && php artisan config:cache && php artisan route:cache && php artisan view:cache && echo 'Starting PHP-FPM...' && php-fpm -D && sleep 2 && echo 'Testing PHP-FPM...' && pgrep php-fpm || exit 1 && echo 'Starting Nginx...' && nginx -t && exec nginx -g 'daemon off;'"]
