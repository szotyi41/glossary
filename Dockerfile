FROM php:7.2-apache
MAINTAINER mesko.balazs@bravonet.hu

RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
RUN sed -i 's/DocumentRoot \/var\/www\/html/DocumentRoot \/var\/www\/html\/src\/public/' /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

EXPOSE 80
