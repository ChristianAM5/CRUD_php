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
    <title>Actualizar usuario</title>
</head>
<body style="background-color:powderblue;">
	<h1>UPDATE USER</h1>

    <form action="php/update.user.php" method="POST">
<!-- Campo oculto para el ID del usuario -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">
        
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirm_password">Confirmar Contraseña:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
 
	<button type="submit">Actualizar</button>
    </form>
    <p><a href="../CRUD.read.php">Volver al crud</a></p>
<?php if (isset($_GET['error'])): ?>
    <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
<?php endif; ?>

<?php if (isset($_GET['success'])): ?>
    <p style="color: green;"><?php echo htmlspecialchars($_GET['success']); ?></p>
<?php endif; ?>
</body>
</html>
