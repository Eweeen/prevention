<?php

namespace App\Interfaces;

use App\Models\Training;
use Illuminate\Database\Eloquent\Collection;

interface TrainingInterface
{
    public function getTrainings(): Collection;
    public function createTraining(array $data): Training;
}

