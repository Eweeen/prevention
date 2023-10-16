<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTrainingRequest;
use App\Interfaces\TrainingInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TrainingController extends Controller
{
    private TrainingInterface $trainingRepository;

    public function __construct(TrainingInterface $trainingRepository)
    {
        $this->trainingRepository = $trainingRepository;
    }

    /**
     * @OA\Get(
     *     path="/api/trainings",
     *     summary="Récupère la liste des formations",
     *     tags={"Trainings"},
     *     @OA\Response(
     *         response=201,
     *         description="Opération réussie",
     *         @OA\JsonContent(
     *             @OA\Property(property="trainings", type="array", @OA\Items(ref="#/components/schemas/Training"))
     *         ),
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Erreur serveur",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="errors", type="object")
     *         ),
     *     ),
     * )
     */
    public function index()
    {
        $trainings = $this->trainingRepository->getTrainings();
        return response()->json([
            'trainings' => $trainings
        ], 201);
    }

    /**
     * @OA\Post(
     *     path="/api/trainings",
     *     summary="Crée une nouvelle formation",
     *     tags={"Trainings"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Données pour ajouter une nouvelle formation",
     *         @OA\JsonContent(ref="#/components/schemas/CreateTrainingRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Formation créée avec succès",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="training", ref="#/components/schemas/Training")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Erreur de validation",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="errors", type="object")
     *         ),
     *     ),
     * )
     */
    public function create(CreateTrainingRequest $request): JsonResponse
    {
        $training = $this->trainingRepository->createTraining($request->all());

        return response()->json([
            'message' => "La Formation " . $training->name . " a été crée avec succès.",
        ], Response::HTTP_CREATED);
    }

}
