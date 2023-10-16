<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Subclient;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SubClientController extends Controller
{
    public function getSubClientsForCurrentUser(): JsonResponse
    {
        $subclients = Auth::user()
            ->client
            ->with('subclients.company')
            ->get()
            ->pluck('subclients')
            ->collapse();

        return response()->json($subclients);
    }
}
