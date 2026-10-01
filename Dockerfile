FROM php:5.6-fpm

# Install mysqli extension
RUN docker-php-ext-install mysqli

WORKDIR /var/www/html