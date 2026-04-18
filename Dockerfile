FROM php:8.2-apache

WORKDIR /var/www/html
COPY . /var/www/html

RUN a2enmod rewrite

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
