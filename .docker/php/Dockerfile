FROM php:7.2-fpm-alpine
ARG TIMEZONE

USER root

WORKDIR /tmp

RUN apk update && apk add --no-cache pcre-dev ${PHPIZE_DEPS} \
    rsync \
    openssh \
    optipng \
    jpegoptim \
    openssl \
    git \
    unzip \
    php-
    mbstring \
    zlib-dev \
    && pecl install redis apcu xdebug \
    && apk del pcre-dev ${PHPIZE_DEPS}

RUN adduser --disabled-password --gecos "" php \
    && echo "php ALL = ( ALL ) NOPASSWD: ALL" >> /etc/sudoers \
    && mkdir -p /var/www/html \
    && chown -R php:php /var/www /home/php \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer global require hirak/prestissimo && rm -rf ~/.composer/cache/*

# Set timezone
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime && echo ${TIMEZONE} > /etc/timezone \
    && printf '[PHP]\ndate.timezone = "%s"\n', ${TIMEZONE} > /usr/local/etc/php/conf.d/tzone.ini \
    && "date"

RUN docker-php-ext-install pdo pdo_mysql mbstring bcmath opcache pcntl posix zip
RUN docker-php-ext-enable redis apcu opcache

# install xdebug
RUN docker-php-ext-enable xdebug \
    && echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_connect_back=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN { \
    echo 'opcache.memory_consumption=256'; \
    echo 'opcache.interned_strings_buffer=8'; \
    echo 'opcache.max_accelerated_files=20000'; \
    echo 'opcache.revalidate_freq=60'; \
    echo 'opcache.fast_shutdown=1'; \
    echo 'opcache.enable=0'; \
    echo 'opcache.enable_cli=0'; \
} > /usr/local/etc/php/conf.d/opcache-recommended.ini

RUN { \
    echo 'short_open_tag=0'; \
    echo 'max_execution_time=600'; \
    echo 'post_max_size = 64M'; \
    echo 'upload_max_filesize = 10M'; \
} >> /usr/local/etc/php/conf.d/zz-conf.ini

USER php

WORKDIR /var/www/html
