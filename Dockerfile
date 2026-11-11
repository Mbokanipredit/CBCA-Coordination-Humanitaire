FROM php:8.2-apache

# Install MySQL PDO and mysqli extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Remove conflicting MPMs and enable mpm_prefork, rewrite, and headers
RUN rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.* \
    && a2enmod mpm_prefork rewrite headers

# Set ServerName and allow .htaccess overrides in /var/www/html
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf \
    && sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf \
    && sed -i 's/<VirtualHost \*:80>/<VirtualHost *:*>/' /etc/apache2/sites-available/000-default.conf

# Copy application source and runtime entrypoint
COPY . /var/www/html/
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh

RUN chmod +x /usr/local/bin/docker-entrypoint.sh \
    && chown -R www-data:www-data /var/www/html

EXPOSE 80 8080

CMD ["/usr/local/bin/docker-entrypoint.sh"]
