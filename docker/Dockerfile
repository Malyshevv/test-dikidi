FROM php:8.2-fpm AS php

RUN apt-get update && apt-get install -y \
    nginx git zip unzip \
    && rm -rf /var/lib/apt/lists/*

COPY ./docker/nginx/default.conf /etc/nginx/sites-available/default

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY ./ ./
RUN composer install --no-dev --optimize-autoloader

CMD service nginx restart && php-fpm