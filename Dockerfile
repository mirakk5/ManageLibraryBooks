FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libzip-dev unzip git libicu-dev libonig-dev \
    && docker-php-ext-install mysqli intl mbstring \
    && a2enmod rewrite

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN { \
    echo '<VirtualHost *:80>'; \
    echo '    DocumentRoot /var/www/html/public'; \
    echo '    <Directory /var/www/html/public>'; \
    echo '        AllowOverride All'; \
    echo '        Require all granted'; \
    echo '    </Directory>'; \
    echo '    ErrorLog ${APACHE_LOG_DIR}/error.log'; \
    echo '    CustomLog ${APACHE_LOG_DIR}/access.log combined'; \
    echo '</VirtualHost>'; \
    } > /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html
