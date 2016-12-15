FROM php:5.6-apache

RUN apt-get update
RUN apt-get install -y libcurl4-openssl-dev libbz2-dev tesseract-ocr
RUN docker-php-ext-install curl

# Enable Apache mod_rewrite
RUN a2enmod rewrite
