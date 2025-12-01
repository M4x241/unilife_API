# Use the official PHP image
FROM php:8.3-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies + GD dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libwebp-dev \
    libonig-dev \
    libxml2-dev

# Configure and install GD correctly
RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
    --with-webp && \
    docker-php-ext-install gd

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Copy the application
COPY . /var/www
COPY --chown=www-data:www-data . /var/www

# Use www-data (Laravel recommended)
USER www-data

# Expose port and start php-fpm
EXPOSE 9000
CMD ["php-fpm"]
