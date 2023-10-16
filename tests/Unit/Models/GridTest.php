<?php

namespace Tests\Unit\Models;

use App\Models\Course;
use App\Models\Criterion;
use App\Models\Grid;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GridTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test fillable attributes.
     *
     * @return void
     */
    public function test_fillable_attributes(): void
    {
        $grid = new Grid([
            'name' => 'Grid Name',
        ]);

        $this->assertEquals('Grid Name', $grid->name);
    }

    /**
     * Test courses relation.
     *
     * @return void
     */
    public function test_courses_relation(): void
    {
        $grid = Grid::factory()->create();
        Course::factory()->count(3)->create(['grid_id' => $grid->id]);

        $this->assertEquals(3, $grid->courses->count());
        $this->assertInstanceOf(Course::class, $grid->courses->first());
    }

    /**
     * Test criteria relation.
     *
     * @return void
     */
    public function test_criteria_relation(): void
    {
        $grid = Grid::factory()->create();
        $criteria = Criterion::factory()->count(3)->create();
        $grid->criteria()->attach($criteria);

        $this->assertEquals(3, $grid->criteria->count());
        $this->assertInstanceOf(Criterion::class, $grid->criteria->first());
    }

}
