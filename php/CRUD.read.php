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
	echo "<tr>
		<td>{$row['id']}</td>  
		<td>{$row['name']}</td>
		<td>{$row['description']}</td>
		<td>{$row['price']}</td>  
		<td>{$row['stock']}</td>  
		<td>{$row['created_at']}</td>  
		<td>{$row['updated_at']}</td>  
		<td><a href='CRUD.update.php?id={$row['id']}'>Editar</a></td>
	      </tr>";
	    }
	} else {
    echo "<tr><td colspan='3'>No hay datos disponibles</td></tr>";
}

$conn->close();
?>
