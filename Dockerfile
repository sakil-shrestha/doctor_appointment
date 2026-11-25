# Stage 1: Build frontend assets
FROM node:22 AS frontend

WORKDIR /app

COPY package*.json ./

RUN npm ci
COPY . .
RUN npm run build


# Stage 2: Prepare the Laravel application
FROM php:8.3-fpm
WORKDIR /var/www/html

# Install system libraries
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libcurl4-openssl-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)"  \
    pdo_mysql \
    zip \
    mbstring \
    curl \
    intl \
    bcmath \
    gd \
    xml \
    sockets \
    exif \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer from the official Composer image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .

# Install production PHP dependencies
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --prefer-dist


# Copy compiled frontend assets
COPY --from=frontend /app/public/build ./public/build

RUN chown -R www-data:www-data storage bootstrap/cache
EXPOSE 9000
CMD ["php-fpm"]






