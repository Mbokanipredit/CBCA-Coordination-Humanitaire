FROM php:8.2-apache

# Install MySQL PDO and mysqli extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Enable Apache mod_rewrite for clean URLs (.htaccess)
RUN a2enmod rewrite headers

# Allow .htaccess overrides in /var/www/html
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Copy application source
COPY . /var/www/html/

# Ensure proper permissions for web assets and uploads
RUN chown -R www-data:www-data /var/www/html

# Configure Apache to listen on Railway's dynamic $PORT (defaults to 80 locally)
CMD sh -c "PORT=\${PORT:-80}; sed -i \"s/80/\${PORT}/g\" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf && apache2-foreground"

