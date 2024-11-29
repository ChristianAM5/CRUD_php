<!-- resources/views/animales/index.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Animales</title>
</head>
<body>
    <h1>Animales</h1>

    <a href="{{ route('animales.create') }}">Crear Nuevo Animal</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Especie</th>
                <th>Edad</th>
                <th>Color</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animales as $animal)
                <tr>
                    <td>{{ $animal->nombre }}</td>
                    <td>{{ $animal->especie }}</td>
                    <td>{{ $animal->edad }}</td>
                    <td>{{ $animal->color }}</td>
                    <td>
                        <a href="{{ route('animales.show', $animal->id) }}">Ver</a>
                        <a href="{{ route('animales.edit', $animal->id) }}">Editar</a>
                        <form action="{{ route('animales.destroy', $animal->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
