# Use the official PHP image with Apache
FROM php:8.2-apache

# Install necessary PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache's mod_rewrite module
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy the custom Apache configuration
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Optionally, install Composer dependencies (uncomment if needed)
# COPY composer.json composer.lock ./
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# RUN composer install --no-dev --optimize-autoloader

# Copy the application code (if not using volume mounting)
# COPY . /var/www/html
