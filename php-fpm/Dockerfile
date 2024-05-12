FROM php:8.2-rc-fpm

RUN apt-get update && apt-get install -y \
      git \
      libicu-dev \
      libpq-dev \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-install -j$(nproc) pgsql \
    && docker-php-ext-install -j$(nproc) pdo \
    && docker-php-ext-install -j$(nproc) pdo_pgsql
#    && docker-php-ext-install -j$(nproc) intl \
#    && docker-php-ext-install -j$(nproc) pgsql \
#    && docker-php-ext-install -j$(nproc) pdo_pgsql \
#    && docker-php-ext-install -j$(nproc) pdo_mysql

# Enable pdo_pgsql extension
RUN echo "extension=pdo_pgsql" >> /usr/local/etc/php/conf.d/docker-php-ext-pdo_pgsql.ini

WORKDIR /var/www

RUN curl -sS https://get.symfony.com/cli/installer | bash


EXPOSE 9000
CMD ["php-fpm"]
