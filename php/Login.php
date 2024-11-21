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
        die('Por favor, completa todos los campos.');
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
            
            echo "Inicio de sesión exitoso. Bienvenido, " . $user['username'] . "!";
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "El correo electrónico no está registrado.";
    }
} else {
    die('Método no permitido.');
}

// Cerrar la conexión
mysqli_close($connection);
?>
