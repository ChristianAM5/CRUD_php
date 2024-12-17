#!/bin/bash

# Esperar a que MySQL inicie completamente
sleep 20  # Incrementa el tiempo de espera

# Verificar si la base de datos ya existe
if ! mysql -u root -proot -e "USE nombre_de_base_de_datos"; then
    echo "Base de datos no encontrada, creando e importando datos..."

    # Importar la base de datos
    mysql -u root -proot < /var/lib/mysql/database.sql
else
    echo "La base de datos ya existe, no se importa."
fi
