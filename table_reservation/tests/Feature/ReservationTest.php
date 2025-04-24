<?php
namespace Tests\Feature;

use App\Models\Reservation;
use App\Models\Table;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    // Test 1: Acceder al listado de reservas
    public function test_reservation_index_can_be_accessed()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/reservations');
        $response->assertStatus(200);
    }

    // Test 2: Acceder a la vista de creación
    public function test_reservation_create_view_loads()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/reservations/create');
        $response->assertStatus(200);
    }

    // Test 3: Crear reserva válida
    public function test_valid_reservation_is_stored()
{
    $user = User::factory()->create();
    $zone = Zone::factory()->create();
    $table = Table::factory()->create(['zone_id' => $zone->id]);

    $response = $this->actingAs($user)->post('/reservations', [
        'table_id' => $table->id,
        'fecha_inicio' => now()->addDay()->format('Y-m-d H:i:s'),
        'fecha_fin' => now()->addDay()->addHours(2)->format('Y-m-d H:i:s'),
        'numero_comensales' => $table->chair_number, // Usamos chair_number como capacidad
    ]);

    $response->assertRedirect('/reservations');
    $this->assertDatabaseHas('reservations', [
        'table_id' => $table->id,
        'user_id' => $user->id
    ]);
}

    // Test 4: No guardar reserva inválida
    public function test_invalid_reservation_shows_errors()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/reservations', [
            'table_id' => '',
            'fecha_inicio' => 'invalid-date',
            'numero_comensales' => 0,
        ]);

        $response->assertSessionHasErrors(['table_id', 'fecha_inicio', 'fecha_fin', 'numero_comensales']);
        $this->assertDatabaseCount('reservations', 0);
    }

    // Test 5: Eliminar reserva
    public function test_reservation_can_be_deleted()
    {
        $user = User::factory()->create();
        $reservation = Reservation::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete("/reservations/{$reservation->id}");
        $response->assertRedirect('/reservations');
        $this->assertDatabaseMissing('reservations', ['id' => $reservation->id]);
    }
}
