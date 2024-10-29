# Dockerfile
FROM php:8.0-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql gd

# Install Redis extension
RUN pecl install redis && docker-php-ext-enable redis

# Set working directory
WORKDIR /var/www

# Copy existing application files
COPY . /var/www

# Give permissions to the www-data user
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

EXPOSE 9000
CMD ["php-fpm"]
