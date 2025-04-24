@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Reserva</h1>

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <label for="table_id">Mesa:</label>
        <select name="table_id" id="table_id">
            @foreach($zones as $zone)
                @foreach($zone->tables as $table)
                    <option value="{{ $table->id }}">{{ $table->name }} (Zona: {{ $zone->name }})</option>
                @endforeach
            @endforeach
        </select>

        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="datetime-local" name="fecha_inicio" required>

        <label for="fecha_fin">Fecha de Fin:</label>
        <input type="datetime-local" name="fecha_fin" required>

        <label for="numero_comensales">Número de Comensales:</label>
        <input type="number" name="numero_comensales" required>

        <button type="submit">Guardar Reserva</button>
    </form>
@endsection

