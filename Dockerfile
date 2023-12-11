FROM php:8.0-apache
RUN apt-get update && apt-get upgrade -y
RUN a2enmod rewrite
# COPY 000-default.conf /etc/apache2/sites-available
RUN docker-php-ext-install mysqli pdo_mysql
RUN apt-get install -y --no-install-recommends libfreetype6-dev libjpeg62-turbo-dev libpng-dev 
RUN docker-php-ext-configure gd --with-jpeg 
RUN docker-php-ext-install -j$(nproc) gd
RUN apt-get update && apt-get install -y libmcrypt-dev 
RUN pecl install mcrypt-1.0.4 
RUN docker-php-ext-enable mcrypt
RUN apt-get update && apt-get install -y zlib1g-dev libzip-dev 
RUN docker-php-ext-install zip gd
RUN apt-get update && apt-get install -y vim