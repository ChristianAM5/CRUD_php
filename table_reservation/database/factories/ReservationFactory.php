<?php

namespace Database\Factories;

use App\Models\Table;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    public function definition()
    {
        return [
            'table_id' => Table::factory(),
            'user_id' => User::factory(),
            'fecha_inicio' => now()->addDay(),
            'fecha_fin' => now()->addDay()->addHours(2),
            'numero_comensales' => $this->faker->numberBetween(1, 8),
        ];
    }
}
