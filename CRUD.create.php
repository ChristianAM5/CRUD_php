<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: Login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
</head>
<body style="background-color:powderblue;">
    <h1>Crear Producto</h1>
    <form action="php/CRUD.create.php" method="POST">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="description">Descripción:</label>
        <textarea id="description" name="description" required></textarea><br><br>
        
        <label for="price">Precio:</label>
        <input type="text" id="price" name="price" required><br><br>
        
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required><br><br>
        
        <button type="submit">Crear Producto</button>
    </form>
    <p><a href="../CRUD.read.php">Volver al listado</a></p>

<?php if (isset($_GET['error'])): ?>
    <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
<?php endif; ?>

<?php if (isset($_GET['success'])): ?>
    <p style="color: green;"><?php echo htmlspecialchars($_GET['success']); ?></p>
<?php endif; ?>
</body>
</html>
