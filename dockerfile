FROM richarvey/nginx-php-fpm:latest

# Copy semua file project
COPY . /var/www/html

# Environment variables untuk Nginx & PHP
ENV WEBROOT="/var/www/html/public"
ENV PHP_ERRORS_STDERR="1"
ENV ERRORS="1"
ENV APP_ENV="production"

# Install composer dependencies
RUN composer install --no-dev --optimize-autoloader

EXPOSE 80