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
    <title>Bienvenido</title>
</head>
<body style="background-color:powderblue;">
    <h1>Bienvenido al Sistema de Gestión</h1>
    <p>Hola, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>. ¿Qué deseas hacer hoy?</p>
    <ul>
        <li><a href="CRUD.read.php">Gestionar Productos</a></li>
        <li><a href="php/Logout.php">Cerrar sesión</a></li>
    </ul>
</body>
</html>
