<?php
session_start(); // Inicia la sesión

if (!isset($_SESSION['user_id'])) {
    header("Location: Login.html");
    exit;
} else {
    header("Location: Index.php");
    exit;
}
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body style="background-color:powderblue;">
    <h1>Iniciar Sesión</h1>
    <form action="/php/Login.php" method="POST">
        <label for="email">Correo Electrónico:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Iniciar Sesión</button>
    </form>
    <p>¿No tienes una cuenta? <a href="Registro.html">Regístrate aquí</a></p>
</body>
</html>
