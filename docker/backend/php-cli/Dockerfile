FROM ubuntu:16.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get clean
RUN apt-get update
RUN apt-get install -y --no-install-recommends apt-utils

# Set the locale
RUN apt-get install -y locales
RUN locale-gen en_US.UTF-8

ENV LANGUAGE=en_US.UTF-8
ENV LC_ALL=en_US.UTF-8
ENV LC_CTYPE=UTF-8
ENV LANG=en_US.UTF-8

# Install Dev tools
RUN apt-get install -y \
    git \
    curl \
    vim

RUN apt-get install unzip

# Add the "PHP 7" ppa
RUN apt-get install -y software-properties-common
RUN add-apt-repository -y ppa:jason.grammenos.agility/php

RUN apt-get update
RUN apt-get install -y \
    php7.2 \
    php7.2-cli \
    php7.2-fpm \
    php7.2-common \
    php7.2-curl \
    php7.2-json \
    php7.2-xml \
    php7.2-mbstring \
    php7.2-mysql \
    php7.2-zip \
    php7.2-memcached \
    php7.2-gd \
    php7.2-dev \
    php7.2-soap \
    libmcrypt-dev \
    pkg-config \
    libcurl4-openssl-dev \
    libedit-dev \
    libssl-dev \
    libxml2-dev

# install node js
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quiet \
    && rm -rf /root/.composer/cache

# Cleanup
RUN apt-get clean

COPY ./common/backend/scripts/ /scripts/


RUN useradd -ms /bin/bash cli-user
USER cli-user

WORKDIR /app
CMD ["/bin/bash","/scripts/fix_permissions.sh"]
