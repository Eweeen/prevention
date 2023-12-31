<?php

namespace Tests\Unit\Models;

use App\Models\Center;
use App\Models\Training;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CenterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test fillable attributes.
     *
     * @return void
     */
    public function test_fillable_attributes(): void
    {
        $center = new Center([
            'name' => 'Center Name',
            'address' => '123 Center St',
        ]);

        $this->assertEquals('Center Name', $center->name);
        $this->assertEquals('123 Center St', $center->address);
    }

    /**
     * Test trainings' relation.
     *
     * @return void
     */
    public function test_trainings_relation(): void
    {
        $center = Center::factory()->create();
        $training = Training::factory()->create(['center_id' => $center->id]);

        // Check from the perspective of the Center
        $this->assertInstanceOf(Training::class, $center->trainings->first());
        $this->assertEquals($training->id, $center->trainings->first()->id);

        // Now check from the perspective of the Training
        $this->assertInstanceOf(Center::class, $training->center);
        $this->assertEquals($center->id, $training->center->id);
    }

}
