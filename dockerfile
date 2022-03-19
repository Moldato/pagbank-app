ARG PHP_VERSION=7.3-apache

FROM php:${PHP_VERSION}
ENV XDEBUG_VERSION=3.1.3

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update \ 
    && apt-get install wget

RUN cd /tmp \
    && wget -q https://xdebug.org/files/xdebug-${XDEBUG_VERSION}.tgz \
    && tar -zxvf xdebug-${XDEBUG_VERSION}.tgz \
    && cd xdebug-${XDEBUG_VERSION} \
    && phpize \
    && ./configure --enable-xdebug \
    && make \
    && cp modules/xdebug.so /usr/local/lib/php/extensions/no-debug-non-zts-20180731 \
    && echo 'zend_extension = xdebug' >> /usr/local/etc/php/conf.d/99-xdebug.ini
