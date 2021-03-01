# https://hub.docker.com/_/php
# https://pkgs.alpinelinux.org/packages?name=php8-*&branch=v3.13
ARG PHP_STACK_VERSION
FROM php:${PHP_STACK_VERSION}
###############################################################################

ARG COMPOSER_VERSION
ARG PHP_APK_VERSION

# Update & add software
RUN apk update && apk upgrade && apk -U --no-cache add \
    ${PHP_APK_VERSION}-ctype \
    ${PHP_APK_VERSION}-iconv \
    ${PHP_APK_VERSION}-mbstring \
    && rm -rf /var/cache/apk/*

# Add latest composer
RUN php -r "readfile('http://getcomposer.org/installer');" | \
    php -- --install-dir=/usr/bin/ --filename=composer --${COMPOSER_VERSION}

# See https://github.com/docker-library/php/issues/240
# ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php

# during development mount volume only - when deployed, use copy in dockerfile
COPY ./src /opt/stack/src
RUN cd /opt/stack && \
    mv /opt/stack/src/composer.json /opt/stack/composer.json && \
    composer install -o --quiet
