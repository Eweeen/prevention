<?php

namespace Tests\Unit\Repositories;

use App\Models\Training;
use App\Repositories\TrainingRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class TrainingRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the getTrainings method of TrainingRepository.
     *
     * @return void
     */
    public function testGetTrainings()
    {
        $trainingMock = Mockery::mock(Training::class);
        $trainingMock->shouldReceive('all')->once()->andReturn(new Collection);

        $trainingRepository = new TrainingRepository($trainingMock);

        $result = $trainingRepository->getTrainings();

        $this->assertInstanceOf(Collection::class, $result);
    }

}

