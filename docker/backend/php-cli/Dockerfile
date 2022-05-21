FROM php:7.2-rc-cli
RUN apt-get update && apt-get install unzip

#RUN pwd
#RUN mv ./common/backend/php/php.ini $PHP_INI_DIR/php.ini
#COPY ./common/php/conf.d /usr/local/etc/php/conf.d

ENV COMPOSER_ALLOW_SUPERUSER 1
COPY ./common/backend/scripts/ /scripts/

RUN docker-php-ext-install pdo_mysql mysqli
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quiet \
    && rm -rf /root/.composer/cache

WORKDIR /app
CMD ["/bin/bash","/scripts/fix_permissions.sh"]
