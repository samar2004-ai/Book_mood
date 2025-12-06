FROM php:8.2-apache

# Activer mod_rewrite si nécessaire
RUN a2enmod rewrite

# Copier les fichiers
COPY . /var/www/html/

# Donner permissions
RUN chown -R www-data:www-data /var/www/html/
