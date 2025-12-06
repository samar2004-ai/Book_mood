FROM php:8.2-apache

# Installer mysqli + extensions utiles
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Activer mod_rewrite
RUN a2enmod rewrite

# Copier les fichiers dans Apache
COPY . /var/www/html/

# Permissions
RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80
