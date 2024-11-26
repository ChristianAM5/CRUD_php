<?php
// Iniciar la sesión
session_start();

// Conexión a la base de datos
$host = "localhost";
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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar que los campos no estén vacíos
    if ($email == '' || $password == '') {
        $_SESSION['error'] = "Por favor, completa todos los campos.";
        header("Location: ../Login.html");
        exit;
    }

    // Consultar el usuario en la base de datos
    $query = "SELECT id, username, password_hash FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verificar la contraseña
        if (password_verify($password, $user['password_hash'])) {
            // Configurar la sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirigir al índice
            header("Location: ../Index.php");
            exit;
        } else {
            $_SESSION['error'] = "Contraseña incorrecta.";
            header("Location: ../Login.html");
            exit;
        }
    } else {
        $_SESSION['error'] = "El correo electrónico no está registrado.";
        header("Location: ../Registro.html");
        exit;
    }
} else {
    $_SESSION['error'] = "Método no permitido.";
    header("Location: ../Registro.html");
    exit;
}

// Cerrar la conexión
mysqli_close($connection);
?>
