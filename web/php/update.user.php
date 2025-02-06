<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Conexión a la base de datos
$host = "127.0.0.1";
$dbname = "CRUD_PHP";
$user = "CRUD_PHP";
$password = "usuario123";

$connection = mysqli_connect($host, $user, $password, $dbname);

// Verificar si la conexión fue exitosa
if (!$connection) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $id = $_POST['id'];

    // Validar que los campos no estén vacíos
    if ($username == '' || $email == '' || $password == '' || $confirm_password == '') {
        header("Location: ../update.user.php.html?error=Todos los campos son obligatorios.");
        exit;
    }

    // Validar que las contraseñas coincidan
    if ($password != $confirm_password) {
        header("Location: ../update.user.php?error=Las contraseñas no coinciden.");
        exit;
    }

    // Encriptar la contraseña
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Actualizar el usuario en la base de datos
	$query = "UPDATE users SET username = '$username', email = '$email', password_hash = '$password_hash', created_at = NOW() WHERE id = '$id'";

    if (mysqli_query($connection, $query)) {
        header("Location: ../Index.php");
        exit;
    } else {
        header("Location: ../update.user.php?error=Error al registrar el usuario: " . mysqli_error($connection));
        exit;
    }
} else {
    header("Location: ../Registro.html?error=Método no permitido.");
    exit;
}

// Cerrar la conexión
mysqli_close($connection);
?>
