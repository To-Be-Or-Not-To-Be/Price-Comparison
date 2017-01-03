#FROM tutum/apache-php

#RUN pear install HTTP_Request2

#COPY . /var/www/html/app

FROM php:7.0-apache
COPY src/ /var/www/html