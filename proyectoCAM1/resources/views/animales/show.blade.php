<!-- resources/views/animales/show.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Animal</title>
</head>
<body>
    <h1>Detalles del Animal</h1>

    <p><strong>Nombre:</strong> {{ $animal->nombre }}</p>
    <p><strong>Especie:</strong> {{ $animal->especie }}</p>
    <p><strong>Edad:</strong> {{ $animal->edad }}</p>
    <p><strong>Color:</strong> {{ $animal->color }}</p>

    <a href="{{ route('animales.index') }}">Volver</a>
</body>
</html>
