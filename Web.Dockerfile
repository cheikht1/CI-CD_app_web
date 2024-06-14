FROM php:apache

RUN docker-php-ext-install mysqli

COPY . /var/www/html/

RUN chmod -R 755 /var/www/html/

RUN a2enmod rewrite

RUN a2enmod status
RUN { \
    echo '<Location "/metrics">'; \
    echo '    SetHandler server-status'; \
    echo '    Require all granted'; \
    echo '</Location>'; \
    echo 'ExtendedStatus On'; \
    } > /etc/apache2/conf-available/status.conf

RUN a2enconf status
RUN command