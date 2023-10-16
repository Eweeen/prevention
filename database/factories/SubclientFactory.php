<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Company;
use App\Models\Subclient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subclient>
 */
class SubclientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::factory()->create()->id,
            'client_id' => Client::factory()->create()->id,
        ];
    }
}
