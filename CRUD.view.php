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
    <title>Listado de Productos</title>
</head>
<body style="background-color:powderblue;">
    <h1>Listado de Productos</h1>
    <p>Hola, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></p>
    <p><a href="CRUD.create.php">Crear productos</a></p>
    <p><a href="CRUD.delete.php">Eliminar productos</a></p>
    <p><a href="CRUD.update.php">Actualizar productos</a></p>

    <p><a href="Index.php">Volver al inicio</a></p>

<table border="1px solid black">
    <tr>
		<td>id</td>
		<td>nombre</td>
		<td>descripción</td>
		<td>precio</td>
		<td>cantidad</td>
		<td>fecha de creación</td>
		<td>fecha de actualización</td>
    </tr>
<?php
// Conexión a la base de datos
$host = "localhost";
$dbname = "CRUD_PHP";
$user = "CRUD_PHP";
$password = "usuario123";

$connection = mysqli_connect($host, $user, $password, $dbname);

//Obtener todos los productos de la base de datos 
$query = "SELECT * FROM products";

//Mostrar los productos en forma de tabla
if ($result = $connection->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $valor1 = $row["id"];
        $valor2 = $row["name"];
        $valor3 = $row["description"];
        $valor4 = $row["price"];
        $valor5 = $row["stock"];
        $valor6 = $row["created_at"]; 
        $valor7 = $row["updated_at"];  

        echo '<tr> 
                <td>'.$valor1.'</td> 
                <td>'.$valor2.'</td> 
                <td>'.$valor3.'</td> 
                <td>'.$valor4.'</td> 
                <td>'.$valor5.'</td> 
                <td>'.$valor6.'</td> 
                <td>'.$valor7.'</td> 
              </tr>';
    }
    $result->free();
} 
?>
</table>
</body>
</html>
