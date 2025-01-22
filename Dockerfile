# Usar una imagen base de PHP oficial con Apache
FROM php:8.1-apache

# Activar el módulo de reescritura de Apache
RUN a2enmod rewrite

# Instalar extensiones de PHP necesarias para PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql

# Copiar los archivos de la API al directorio raíz de Apache
COPY . /var/www/html/

# Establecer los permisos correctos para los archivos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exponer el puerto 80 (por defecto de Apache)
EXPOSE 80

# Comando por defecto para iniciar Apache en primer planosssss
CMD ["apache2-foreground"]
