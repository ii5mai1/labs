FROM ubuntu:latest

ENV APACHE_VERSION=2.4.58-1ubuntu8.4

RUN apt-get update && apt-get install -y wget gnupg2 software-properties-common php php-cli php-fpm

RUN echo "deb http://archive.ubuntu.com/ubuntu/ $(lsb_release -sc) main universe" > /etc/apt/sources.list.d/apache.list

RUN apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 3B4FE6ACC0B21F32

RUN apt-get update && apt-get install -y apache2=$APACHE_VERSION

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite 

COPY index.html /var/www/html/index.html
COPY upload.php /var/www/html/upload.php

RUN mkdir /var/www/html/uploads && chown www-data:www-data /var/www/html/uploads

EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]
