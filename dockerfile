FROM richarvey/nginx-php-fpm:latest

# Copy seluruh file project
COPY . /var/www/html

# Atur Nginx Document Root & enable URL Rewriting Laravel
ENV WEBROOT="/var/www/html/public"
ENV PHP_ERRORS_STDERR="1"
ENV ERRORS="1"
ENV APP_ENV="production"
ENV NGINX_CONF_INCLUDE="laravel"

# Install composer dependencies
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Set permission folder storage & cache agar Laravel bisa buat session/login
RUN chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80