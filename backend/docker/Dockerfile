FROM php:8.2-fpm-alpine

LABEL maintainer="Logi"

# workdir
WORKDIR /var/www/html

# install supervisor

RUN apk add --no-cache supervisor libpng-dev zlib-dev libzip-dev

# copy supervisor config
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY php.ini /usr/local/etc/php/php.ini

# install extensions for php mysql
RUN docker-php-ext-install pdo pdo_mysql gd zip

# run supervisor
CMD /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf

