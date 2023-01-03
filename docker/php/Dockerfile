FROM php:8.1-fpm

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
RUN pecl install xdebug

RUN docker-php-ext-enable xdebug

RUN touch /var/log/xdebug.log
RUN chmod 777 /var/log/xdebug.log
RUN touch /var/log/xdebug.log
COPY nginx.conf /etc/nginx
COPY site.conf /etc/nginx/sites-enabled/default
COPY php.ini /usr/local/etc/php/php.ini
COPY entrypoint.sh /etc/entrypoint.sh

COPY xdebug.ini "${PHP_INI_DIR}/conf.d"

ENV PHP_IDE_CONFIG serverName=localhost

WORKDIR /lendflow
COPY . /lendflow

EXPOSE 9000 9003

ENTRYPOINT ["sh", "/etc/entrypoint.sh"]

RUN ls -la
RUN chown -R www-data:www-data /lendflow
