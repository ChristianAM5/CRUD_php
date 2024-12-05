# Usa una imagen base de Ubuntu
FROM ubuntu:20.04

# Configura el entorno no interactivo para evitar prompts
ENV DEBIAN_FRONTEND=noninteractive

# Actualiza el sistema e instala Apache, PHP, MySQL y utilidades necesarias
RUN apt-get update && apt-get install -y \
    apache2 \
    mysql-server \
    php \
    php-mysql \
    libapache2-mod-php 

# Habilita el módulo de reescritura de Apache
RUN a2enmod rewrite

# Copia los archivos del proyecto al servidor web
COPY . /var/www/html/

# Copia el archivo SQL al contenedor
COPY database.sql /docker-entrypoint-initdb.d/

# Configura permisos
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Expone el puerto 80 para Apache y 3306 para MySQL
EXPOSE 80 3306

# Inicia Apache y MySQL
CMD service mysql start && apache2ctl -D FOREGROUND
