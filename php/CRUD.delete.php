<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login.html");
    exit;
}

// Conexión a la base de datos
$host = "localhost";
$dbname = "CRUD_PHP";
$user = "CRUD_PHP";
$password = "usuario123";

$connection = mysqli_connect($host, $user, $password, $dbname);

if (!$connection) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Validar que el ID esté presente y sea válido
if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    die("ID de producto no válido");
}

$id = $_POST['id'];

// Eliminar producto
$query = "DELETE FROM products WHERE id = $id";

if (mysqli_query($connection, $query)) {
    header("Location: ../CRUD.read.php?success=Producto eliminado correctamente");
} else {
    header("Location: ../CRUD.read.php?error=Error al eliminar el producto: " . mysqli_error($connection));
}

mysqli_close($connection);
?>
