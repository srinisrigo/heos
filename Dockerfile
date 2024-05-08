FROM php:5.6-apache

# RUN apt-get update && apt-get install -y mysql-client mysql-server php5-mysql

RUN docker-php-ext-install -j$(nproc) mysql opcache

RUN a2enmod rewrite