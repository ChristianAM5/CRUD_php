#!/bin/bash

# Corrige el directorio principal del usuario mysql si es necesario
if [ "$(grep mysql /etc/passwd | cut -d':' -f6)" = "/nonexistent" ]; then
    echo "Corrigiendo el directorio del usuario mysql..."
    usermod -d /var/lib/mysql mysql
    chown -R mysql:mysql /var/lib/mysql
fi

# Inicializa MySQL si aún no está inicializado
if [ ! -d "/var/lib/mysql/mysql" ]; then
    echo "Inicializando datos de MySQL..."
    mysqld --initialize-insecure --user=mysql --datadir=/var/lib/mysql
fi

# Inicia el servicio MySQL
service mysql start

# Verifica si existe un archivo init.sql para ejecutarlo
if [ -f "/docker-entrypoint-initdb.d/database.sql" ]; then
    echo "Ejecutando database.sql..."
    mysql -u root < /docker-entrypoint-initdb.d/database.sql
else
    echo "No se encontró un archivo init.sql para ejecutar."
fi

# Detiene MySQL para reiniciarlo correctamente en el primer plano
service mysql stop

# Inicia Apache y MySQL en primer plano
apache2ctl -D FOREGROUND
