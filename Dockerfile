FROM php:8.4-fpm

# Force cache invalidation - updated 2026-05-30
ARG CACHEBUST=1

# Install system dependencies (updated: added procps for process management)
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
    procps \
    gettext-base \
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

# Copy nginx config template
COPY docker/nginx-template.conf /etc/nginx/nginx-template.conf
RUN rm -f /etc/nginx/sites-enabled/default

# Copy and set up startup script
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Copy startup script (legacy)
COPY railway-start.sh /usr/local/bin/railway-start.sh
RUN chmod +x /usr/local/bin/railway-start.sh

# Expose port (Railway will map this)
EXPOSE 8080

# Use simple inline startup with PORT substitution
CMD export PORT=${PORT:-8080} && \
    envsubst '${PORT}' < /etc/nginx/nginx-template.conf > /etc/nginx/conf.d/default.conf && \
    echo "Nginx will listen on port $PORT" && \
    php artisan storage:link 2>&1 || true && \
    echo "Running migrations..." && \
    php artisan migrate --force 2>&1 && \
    echo "Caching..." && \
    php artisan config:cache 2>&1 && \
    php artisan route:cache 2>&1 && \
    php artisan view:cache 2>&1 && \
    echo "Starting PHP-FPM..." && \
    php-fpm -D && \
    sleep 3 && \
    echo "PHP-FPM status:" && \
    ps aux | grep php-fpm | grep -v grep && \
    echo "Starting Nginx..." && \
    nginx -t && \
    echo "=== Services Started on port $PORT ===" && \
    exec nginx -g 'daemon off;'
