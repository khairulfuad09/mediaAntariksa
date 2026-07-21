FROM richarvey/nginx-php-fpm:latest

# Copy seluruh file proyek
COPY . /var/www/html

# Overwrite konfigurasi Nginx dengan file site.conf milik kita
COPY site.conf /etc/nginx/sites-available/default.conf

# Environment variables
ENV WEBROOT="/var/www/html/public"
ENV PHP_ERRORS_STDERR="1"
ENV ERRORS="1"
ENV APP_ENV="production"

# Install dependencies composer
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Set izin akses folder storage dan bootstrap cache
RUN chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80