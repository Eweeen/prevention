<?php

namespace Tests\Feature\Controllers\Api;

use App\Models\Center;
use App\Models\Grid;
use App\Models\Offer;
use App\Models\Subclient;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class TrainingControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Create Training
     */
    public function test_create_training()
    {

        $offer = Offer::factory()->create(['name' => 'Plus']);
        $user = User::factory()->create();
        $trainer = Trainer::factory()->create(['user_id' => $user->id]);
        $center = Center::factory()->create();
        $grid = Grid::factory()->create();
        $subclient = Subclient::factory()->create();

        $this->actingAs($user);

        $trainingData = [
            'training_name' => 'Training Test',
            'center_id' => $center->id,
            'training_date' => now()->addDay()->format('Y-m-d'),
            'subclient_id' => $subclient->id,
            'grid_id' => $grid->id
        ];


        $response = $this->json('POST', '/api/trainings/create', $trainingData);

        $response->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('trainings', [
            'name' => 'Training Test',
            'center_id' => $center->id,
            'offer_id' => $offer->id,
            'trainer_id' => $trainer->id,
        ]);
    }

}
