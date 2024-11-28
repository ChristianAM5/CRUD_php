<?php
session_start();

// Conexión a la base de datos
$host = "localhost";
$dbname = "CRUD_PHP";
$user = "CRUD_PHP";
$password = "usuario123";

$connection = mysqli_connect($host, $user, $password, $dbname);

if (!$connection) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener datos del formulario
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$stock = $_POST['stock'];

// Validar que los campos no estén vacíos
if ($name == '' || $description == '' || $price == '' || $stock == '') {
    header("Location: ../CRUD.create.php?error=Todos los campos son obligatorios");
    exit;
}

// Validar que el precio sea numérico y mayor a 0
if (!is_numeric($price) || $price <= 0) {
    header("Location: ../CRUD.create.php?error=El precio debe ser un número positivo");
    exit;
}

// Validar que el stock sea un número entero mayor o igual a 0
if (!is_numeric($stock) || $stock < 0) {
    header("Location: ../CRUD.create.php?error=El stock debe ser un número entero no negativo");
    exit;
}

// Insertar el producto en la base de datos
$query = "INSERT INTO products (name, description, price, stock, created_at, updated_at) 
          VALUES ('$name', '$description', $price, $stock, NOW(), NOW())";

if (mysqli_query($connection, $query)) {
    header("Location: ../CRUD.create.php?success=Producto creado exitosamente");
} else {
    header("Location: ../CRUD.create.php?error=Error al crear el producto: " . mysqli_error($connection));
}

mysqli_close($connection);
?>
