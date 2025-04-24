<?php

namespace Database\Factories;

use App\Models\Table;
use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;

class TableFactory extends Factory
{
    protected $model = Table::class;

   public function definition()
{
    return [
        'name' => $this->faker->word,
        'chair_number' => $this->faker->numberBetween(2, 8),
        'zone_id' => Zone::factory(),
    ];
}
}
