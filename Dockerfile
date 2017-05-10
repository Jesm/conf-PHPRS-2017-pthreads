FROM php:7.0-zts

RUN apt-get update && apt-get install -y \
        libmcrypt-dev \
        libssl-dev \
        htop \
    && docker-php-ext-install -j$(nproc) mcrypt zip \
    && pecl install pthreads \
    && docker-php-ext-enable pthreads

RUN curl -sS https://getcomposer.org/installer | php \
    && chmod a+x composer.phar \
    && mv composer.phar /usr/local/bin/composer

RUN mkdir /app
WORKDIR /app
