<?php

namespace Database\Factories;

use App\Models\Learner;
use App\Models\Subclient;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Learner>
 */
class LearnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id,
            'subclient_id' => Subclient::factory()->create()->id
        ];
    }
}
