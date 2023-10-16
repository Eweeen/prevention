<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Criterion;
use App\Models\Training;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Training::factory(10)->create();
    }
}
