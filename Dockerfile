FROM php:8.2-apache

# Install MySQL PDO and mysqli extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Ensure single MPM (prefork) and enable mod_rewrite + headers for .htaccess
RUN a2dismod mpm_event mpm_worker || true \
    && a2enmod mpm_prefork rewrite headers

# Set ServerName and allow .htaccess overrides in /var/www/html
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf \
    && sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf \
    && sed -i 's/<VirtualHost \*:80>/<VirtualHost *:*>/' /etc/apache2/sites-available/000-default.conf

# Copy application source
COPY . /var/www/html/

# Ensure proper permissions for web assets
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80 8080

# Listen on both port 80 (configured in Railway Networking) and dynamic $PORT (if different)
CMD ["sh", "-c", "if [ -n \"$PORT\" ] && [ \"$PORT\" != \"80\" ] && ! grep -q \"Listen $PORT\" /etc/apache2/ports.conf; then echo \"Listen $PORT\" >> /etc/apache2/ports.conf; fi && exec apache2-foreground"]
