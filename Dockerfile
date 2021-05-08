# ./docker/php/Dockerfile
FROM php:7.2-fpm

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN pecl install apcu

RUN apt-get update && \
apt-get install -y \
zlib1g-dev && apt-get install -y wget

RUN docker-php-ext-install zip
RUN docker-php-ext-enable apcu


WORKDIR /usr/src/app


COPY ./composer.* /usr/src/app/


RUN composer install

RUN PATH=$PATH:/usr/src/apps/vendor/bin:bin
#RUN bin/console doctrine:schema:create


#RUN php php bin/console assets:install
