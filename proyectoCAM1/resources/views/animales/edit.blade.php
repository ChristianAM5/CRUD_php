<!-- resources/views/animales/edit.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Animal</title>
</head>
<body>
    <h1>Editar Animal</h1>

    <form action="{{ route('animales.update', $animal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ $animal->nombre }}" required>
        <br>
        <label for="especie">Especie:</label>
        <input type="text" id="especie" name="especie" value="{{ $animal->especie }}" required>
        <br>
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" value="{{ $animal->edad }}" required>
        <br>
        <label for="color">Color:</label>
        <input type="text" id="color" name="color" value="{{ $animal->color }}" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
