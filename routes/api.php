<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CenterController;
use App\Http\Controllers\API\GridController;
use App\Http\Controllers\API\LearnerController;
use App\Http\Controllers\API\SubClientController;
use App\Http\Controllers\API\TrainingController;
use App\Http\Controllers\API\VehicleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TrainerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::view('/swagger', 'swagger-upkg');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum','ability:user-get-user'])->group(function () {
    Route::post('/learners/store', [LearnerController::class, 'store'])->name('learners.store');
    Route::post('/trainings/create', [TrainingController::class, 'create'])->name('trainings.create');
    Route::post('/vehicles/store', [VehicleController::class, 'store'])->name('vehicles.store');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/getSubClients', [SubClientController::class, 'getSubClientsForCurrentUser']);
    Route::get('/getCenters', [CenterController::class, 'getCentersForCurrentUser']);
    Route::get('/getGrids', [GridController::class, 'getGridsForCurrentUser']);
});

//Route auth pour l'application mobile
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::get('/trainers', [TrainerController::class, 'index']);
Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/trainings', [TrainingController::class, 'index']);
Route::get('/centers', [CenterController::class, 'index']);

Route::post('client/create', [ClientController::class, 'store']);
