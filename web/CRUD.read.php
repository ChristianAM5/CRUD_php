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

    <p><a href="Index.php">Volver al inicio</a></p>
<form action="CRUD.read.php" method="POST">
        <label for="search">Buscar producto:</label>
        <input type="text" name="search" id="search" placeholder="Introduce el nombre del producto">
        <button type="submit">Buscar</button>
    </form>
<?php
	if (isset($_POST['search']) && !empty($_POST['search'])) {
    	$search = $_POST['search'];
    	echo "<p>Resultados para: <strong>$search</strong></p>";
	}
?>
<table border="1px solid black">
    <thead>
	<tr>
		<th>id</th>
		<th>nombre</th>
		<th>descripción</th>
		<th>precio</th>
		<th>cantidad</th>
		<th>fecha de creación</th>
		<th>fecha de actualización</th>
		<th>Accion actualizar</th>
		<th>Accion eliminar</th>
        </tr>
    </thead>
    <tbody>
	<?php include 'php/CRUD.read.php'; ?>
    </tbody>
</body>
</html>
