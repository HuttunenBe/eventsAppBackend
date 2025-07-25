# Use official PHP image with Apache
FROM php:8.2-apache

# Install system dependencies and PHP extensions needed for Laravel
RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Enable Apache mod_rewrite for Laravel routing
RUN a2enmod rewrite

# Change Apache document root to public folder
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Set working directory
WORKDIR /var/www/html

# Copy your Laravel project files into the container
COPY . /var/www/html

# Copy Composer from the official Composer image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP dependencies via Composer (no dev packages)
RUN composer install --no-dev --optimize-autoloader

# Fix permissions for storage and cache directories
RUN chown -R www-data:www-data storage bootstrap/cache

# Set safe directory for git to avoid warnings (optional)
RUN git config --global --add safe.directory /var/www/html

# Expose port 80 to the outside world
EXPOSE 80

# Run Apache in the foreground
CMD ["apache2-foreground"]
