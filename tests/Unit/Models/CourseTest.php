<?php

namespace Tests\Unit\Models;

use App\Models\Course;
use App\Models\Grid;
use App\Models\Training;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test fillable attributes.
     *
     * @return void
     */
    public function test_fillable_attributes(): void
    {
        $course = new Course([
            'observation' => 'Test Observation',
        ]);

        $this->assertEquals('Test Observation', $course->observation);
    }

    /**
     * Test grid relation.
     *
     * @return void
     */
    public function test_grid_relation(): void
    {
        $grid = Grid::factory()->create();
        $course = Course::factory()->create(['grid_id' => $grid->id]);

        $this->assertInstanceOf(Grid::class, $course->grid);
        $this->assertEquals($grid->id, $course->grid->id);
    }

    /**
     * Test training relation.
     *
     * @return void
     */
    public function test_training_relation(): void
    {
        $grid = Grid::factory()->create();
        $training = Training::factory()->create();
        $course = Course::factory()->create([
            'training_id' => $training->id,
            'grid_id' => $grid->id,
            'observation' => 'Some observation'
        ]);

        $this->assertInstanceOf(Training::class, $course->training);
        $this->assertEquals($training->id, $course->training->id);
    }

}
