# Stage 1: Build Stage (keep the final image clean)
FROM composer:latest AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Stage 2: Final Runtime Stage
FROM php:8.2-apache

# 1. Install system dependencies (including ca-certificates for Aiven SSL)
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev \
    zip unzip git curl ca-certificates \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 2. Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 3. Configure Apache
RUN a2enmod rewrite
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# 4. Set working directory and copy app
WORKDIR /var/www/html
COPY . .
# Copy vendor folder from build stage
COPY --from=vendor /app/vendor ./vendor

# 5. Set permissions (Crucial for Laravel)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 6. Production Optimizations
ENV APP_ENV=production
ENV APP_DEBUG=false

# 7. Start script
# We combine caching commands to speed up the app
CMD php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan migrate --force && \
    apache2-foreground