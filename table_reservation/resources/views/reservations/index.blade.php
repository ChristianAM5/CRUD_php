@extends('layouts.app')

@section('content')
    <h1>Reservas</h1>
    <a href="{{ route('reservations.create') }}">Crear Nueva Reserva</a>

    <ul>
        @foreach($reservations as $reservation)
            <li>{{ $reservation->user->name }} reservó la mesa {{ $reservation->table->name }} de {{ $reservation->fecha_inicio }} a {{ $reservation->fecha_fin }}</li>
        @endforeach
    </ul>
@endsection


