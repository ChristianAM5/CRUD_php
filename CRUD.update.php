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
    <title>Editar Producto</title>
</head>
<body style="background-color:powderblue;">
    <h1>Editar Producto, con id <?php echo $product['id']; ?></h1>
    <form action="php/CRUD.update.php" method="POST">
        <!-- Campo oculto para el ID del producto -->
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br><br>

        <label for="description">Descripción:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea><br><br>

        <label for="price">Precio:</label>
        <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>" required><br><br>

        <label for="stock">Cantidad:</label>
        <input type="number" id="stock" name="stock" value="<?php echo $product['stock']; ?>" required><br><br>

        <button type="submit">Guardar Cambios</button>
    </form>
    <p><a href="../CRUD.read.php">Cancelar</a></p>
<?php if (isset($_GET['error'])): ?>
    <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
<?php endif; ?>

<?php if (isset($_GET['success'])): ?>
    <p style="color: green;"><?php echo htmlspecialchars($_GET['success']); ?></p>
<?php endif; ?>
</body>
</html>
