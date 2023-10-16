<?php

namespace App\Http\Controllers;

use App\Interfaces\TrainerInterface;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class TrainerController extends Controller
{
    private TrainerInterface $trainerRepository;

    public function __construct(TrainerInterface $trainerRepository)
    {
        $this->trainerRepository = $trainerRepository;
    }
    public function index()
    {
        $trainers = $this->trainerRepository->getTrainers();

        return response()->json([
            'trainers' => $trainers
        ], Response::HTTP_CREATED);
    }

}
