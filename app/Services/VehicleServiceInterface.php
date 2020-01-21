<?php

namespace App\Services;

use Illuminate\Http\Request;

interface VehicleServiceInterface
{
    /**
     * @param Request $request
     * @return array
     */
    public function getVehicleExpenses(Request $request):array ;
}
