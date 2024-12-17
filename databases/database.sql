-- Crear la base de datos
CREATE DATABASE CRUD_PHP;

-- Usar la base de datos
USE CRUD_PHP;

-- Crear la tabla 'users'
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear la tabla 'products'
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Crear el usuario 'CRUD_PHP' y otorgar permisos
CREATE USER IF NOT EXISTS 'CRUD_PHP'@'localhost' IDENTIFIED BY 'usuario123';

-- Otorgar todos los privilegios al usuario para la base de datos 'CRUD_PHP'
GRANT ALL PRIVILEGES ON CRUD_PHP.* TO 'CRUD_PHP'@'localhost';

-- Aplicar los cambios de permisos
FLUSH PRIVILEGES;
