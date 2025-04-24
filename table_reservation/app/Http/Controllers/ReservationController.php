<?php
namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use App\Models\Zone;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Listado de reservas
    public function index()
    {
        $reservations = Reservation::with(['user', 'table'])->get();
        return view('reservations.index', compact('reservations'));
    }

    // Vista de creación
    public function create()
    {
        $zones = Zone::with('tables')->get();
	return view('reservations.create', compact('zones'));
    }

    // Guardar reserva
    public function store(Request $request)
    {
        $validated = $request->validate([
            'table_id' => 'required|exists:tables,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'numero_comensales' => 'required|integer|min:1',
        ]);

        $reservation = new Reservation($validated);
        $reservation->user_id = auth()->id();
        $reservation->save();

        return redirect()->route('reservations.index');
    }

    // Eliminar reserva
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index');
    }
}
