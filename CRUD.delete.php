<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: Login.html");
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
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de producto no válido");
}

$id = $_GET['id'];

// Consultar el producto
$query = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($connection, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Producto no encontrado");
}

$product = mysqli_fetch_assoc($result);
mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Eliminación</title>
</head>
<body style="background-color:powderblue;">
    <h1>¿Estás seguro de que deseas eliminar el producto con id <?php echo $id; ?>?</h1>
    <p>Esta acción no se puede deshacer.</p>
    <form action="php/CRUD.delete.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit">Eliminar</button>
        <a href="../CRUD.read.php">Cancelar</a>
    </form>
</body>
</html>
