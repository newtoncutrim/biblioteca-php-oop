FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    pkg-config \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install zip  # Instalar a extensão zip

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
# Copiar configuração do Xdebug
COPY app/.docker/php/conf.d/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
