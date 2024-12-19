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

# Copia los archivos del proyecto al servidor web y la creacion de la base de datos
COPY web/ /var/www/html/

COPY database.sql /docker-entrypoint-initdb.d/database.sql

# Copiar el script de inicialización al contenedor
COPY init.sh /usr/local/bin/init.sh

# Hacer que el script sea ejecutable
RUN chmod +x /usr/local/bin/init.sh

# Configura permisos
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Configura la página de inicio de Apache para que sea Registro.html
RUN echo '<Directory "/var/www/html">' >> /etc/apache2/apache2.conf && \
    echo '    DirectoryIndex Registro.html' >> /etc/apache2/apache2.conf && \
    echo '</Directory>' >> /etc/apache2/apache2.conf

# Expone el puerto 80 para Apache y 3306 para MySQL
EXPOSE 80 3306

# Inicia con el archivo configuracion del contenedor
CMD ["/usr/local/bin/init.sh"]
