ARG PHP_VERSION=8.5
FROM php:${PHP_VERSION}-apache
# Install PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql
# Enable Apache mod_rewrite
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/*.conf \
	&& sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-enabled/*.conf \
	&& sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/apache2.conf
# Allow .htaccess overrides
RUN sed -i '/<Directory \/var\/www\/html\/public>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
# Copy app files
COPY . /var/www/html/
# Fix permissions
RUN chown -R www-data:www-data /var/www/html \
&& chmod -R 755 /var/www/html
# Render provides the web-service port through PORT. Apache must listen on it.
CMD ["sh", "-c", "PORT=${PORT:-10000}; sed -ri -e \"s/Listen [0-9]+/Listen ${PORT}/\" -e \"s/<VirtualHost \\\\*:[0-9]+>/<VirtualHost *:${PORT}>/\" /etc/apache2/ports.conf /etc/apache2/sites-available/*.conf /etc/apache2/sites-enabled/*.conf; apache2-foreground"]
EXPOSE 10000