<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Grid;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Grid>
 */
class GridFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'client_id' => Client::factory()->create()->id
        ];
    }
}
