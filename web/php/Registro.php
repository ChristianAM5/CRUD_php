<?php
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

    // Validar que los campos no estén vacíos
    if ($username == '' || $email == '' || $password == '' || $confirm_password == '') {
        header("Location: ../Registro.html?error=Todos los campos son obligatorios.");
        exit;
    }

    // Validar que las contraseñas coincidan
    if ($password != $confirm_password) {
        header("Location: ../Registro.html?error=Las contraseñas no coinciden.");
        exit;
    }

    // Verificar si el usuario o el correo ya están registrados
    $query = "SELECT id FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        header("Location: ../Registro.html?error=El nombre de usuario o correo ya están registrados.");
        exit;
    }

    // Encriptar la contraseña
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Insertar el usuario en la base de datos
    $query = "INSERT INTO users (username, email, password_hash) 
              VALUES ('$username', '$email', '$password_hash')";

    if (mysqli_query($connection, $query)) {
        header("Location: ../Login.html");
        exit;
    } else {
        header("Location: ../Registro.html?error=Error al registrar el usuario: " . mysqli_error($connection));
        exit;
    }
} else {
    header("Location: ../Registro.html?error=Método no permitido.");
    exit;
}

// Cerrar la conexión
mysqli_close($connection);
?>
