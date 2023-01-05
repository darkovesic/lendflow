FROM php:8.1.2-fpm

RUN apt-get update \
    && apt-get install -y \
        libzip-dev \
        git \
        zip \
        unzip \
        nginx \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        zip \
        opcache


RUN pecl install apcu-5.1.21
RUN docker-php-ext-enable apcu

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./docker/php/site.conf /etc/nginx/sites-enabled/default
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini
COPY ./docker/php/entrypoint.sh /etc/entrypoint.sh

WORKDIR /lendflow
COPY . /lendflow


RUN composer install
RUN chmod -R 777 storage
RUN chmod 777 bootstrap/cache

EXPOSE 9000 9003

ENTRYPOINT ["sh", "/etc/entrypoint.sh"]

RUN php artisan config:cache && php artisan config:clear && php artisan cache:clear