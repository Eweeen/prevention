<?php

namespace App\Repositories;

use App\Interfaces\TrainingInterface;
use App\Models\Offer;
use App\Models\Trainer;
use App\Models\Training;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class TrainingRepository implements TrainingInterface
{
    protected Training $training;

    public function __construct(Training $training)
    {
        $this->training = $training;
    }

    public function getTrainings(): Collection
    {
        return $this->training->all();
    }

    public function createTraining(array $data): Training
    {
        $offer = Offer::where('name', 'Plus')->first();
        $trainer = Trainer::where('user_id', Auth::id())->first();

        $this->training->name = $data['training_name'];
        $this->training->center_id = $data['center_id'];
        $this->training->date = $data['training_date'];
        $this->training->offer_id = $offer->id;
        $this->training->trainer_id = $trainer->id;
        $this->training->save();

        return $this->training;
    }

}
