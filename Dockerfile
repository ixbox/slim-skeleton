FROM php:8-apache

RUN apt-get update \
    && apt-get install -y git libzip-dev \
    && docker-php-ext-install zip \
    && a2enmod rewrite

ENV APP_ROOT /app
ENV APACHE_DOCUMENT_ROOT ${APP_ROOT}/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR ${APP_ROOT}
COPY composer.* ${APP_ROOT}/
RUN composer install --no-progress --optimize-autoloader
COPY . ${APP_ROOT}/

