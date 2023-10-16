<?php

namespace Database\Factories;


use App\Models\Training;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<Model>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $trainingId = Training::factory()->create()->first()->getAttribute('id');

        return [
            'observation' => fake()->text(),
            'training_id' => $trainingId
        ];
    }
}
