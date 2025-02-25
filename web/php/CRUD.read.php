<?php
// Conexión a la base de datos
$host = "127.0.0.1";
$dbname = "CRUD_PHP";
$user = "CRUD_PHP";
$password = "usuario123";

$connection = mysqli_connect($host, $user, $password, $dbname);

// Verificar si hay un término de búsqueda
if (isset($_POST['search']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    // Prevenir inyecciones SQL
    $search = mysqli_real_escape_string($connection, $search);
    // Realizar la consulta para buscar productos por nombre o descripción
    $query = "SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
} else {
    // Si no hay búsqueda, mostrar todos los productos
    $query = "SELECT * FROM products";
}

// Ejecutar la consulta
if ($result = $connection->query($query)) {
    // Mostrar los productos encontrados
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
            <td><a href='CRUD.delete.php?id={$row['id']}'>Eliminar</a></td>
          </tr>";
    }
} else {
    echo "<tr><td colspan='9'>No se encontraron productos.</td></tr>";
}

// Cerrar la conexión
$connection->close();
?>
