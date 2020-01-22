<?php

namespace App\Http\Controllers;

use App\Services\VehicleServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * @var VehicleServiceInterface
     */
    private $service;

    /**
     * VehicleController constructor.
     * @param VehicleServiceInterface $service
     */
    public function __construct(VehicleServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function listVehicleExpenses(Request $request): JsonResponse
    {
        $vehicleExpenses = $this->service->getVehicleExpenses($request);
        return response()->json($vehicleExpenses);
    }
}
