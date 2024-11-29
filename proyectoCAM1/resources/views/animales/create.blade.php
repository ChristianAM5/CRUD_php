<!-- resources/views/animales/create.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Animal</title>
</head>
<body>
    <h1>Crear Nuevo Animal</h1>

    <form action="{{ route('animales.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="especie">Especie:</label>
        <input type="text" id="especie" name="especie" required>
        <br>
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required>
        <br>
        <label for="color">Color:</label>
        <input type="text" id="color" name="color" required>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
