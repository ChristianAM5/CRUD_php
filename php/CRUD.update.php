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
$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$stock = $_POST['stock'];

// Validar que los campos no estén vacíos
if ($name == '' || $description == '' || $price == '' || $stock == '') {
    header("Location: ../CRUD.update.php?id=$id&error=Todos los campos son obligatorios");
    exit;
}

// Validar precio y cantidad
if (!is_numeric($price) || $price <= 0) {
    header("Location: ../CRUD.update.php?id=$id&error=El precio debe ser un número positivo");
    exit;
}
if (!is_numeric($stock) || $stock < 0) {
    header("Location: ../CRUD.update.php?id=$id&error=La cantidad debe ser un número entero no negativo");
    exit;
}

// Actualizar producto
$query = "UPDATE products
          SET name = '$name', description = '$description', price = $price, stock = $stock, updated_at = NOW() 
          WHERE id = $id";

if (mysqli_query($connection, $query)) {
    header("Location: ../CRUD.read.php?success=Producto actualizado correctamente");
} else {
    header("Location: ../CRUD.update.php?id=$id&error=Error al actualizar el producto: " . mysqli_error($connection));
}

mysqli_close($connection);
?>
