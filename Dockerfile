# Stage 1: Build Stage (Installs PHP dependencies)
FROM composer:latest AS vendor
WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --ignore-platform-reqs \
    --no-scripts

# Stage 2: Final Runtime Stage (The actual web server)
FROM php:8.2-apache

# 1. Install system dependencies (including ca-certificates for Aiven SSL and Node.js for Vite)
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev \
    zip unzip git curl ca-certificates gnupg \
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 2. Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 3. Configure Apache for Laravel
RUN a2enmod rewrite
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# 4. Set working directory and copy app files
WORKDIR /var/www/html
COPY . .

# Copy the vendor folder from the Builder stage
COPY --from=vendor /app/vendor ./vendor

# --- NEW: Build Frontend Assets ---
# This installs npm packages and runs Vite to generate manifest.json
RUN npm install && npm run build
# ----------------------------------

# 5. Set permissions (Updated to include public/build)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public/build

# 6. Production Optimizations
ENV APP_ENV=production
ENV APP_DEBUG=false

# 7. Start script
CMD php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan migrate --force && \
    apache2-foreground