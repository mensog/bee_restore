FROM php:8.1-fpm

WORKDIR /app 
COPY . .

RUN apt-get update && apt-get install -y git unzip libpng-dev libjpeg-dev libfreetype6-dev curl && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql && \
    pecl install redis && \
    docker-php-ext-enable redis

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

RUN composer install && composer dump-autoload
# RUN pecl install xdebug && docker-php-ext-enable xdebug
