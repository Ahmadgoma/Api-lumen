<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

Trait ApiResponseTrait
{

    /**
     * @param null $data
     * @param bool $status
     * @return JsonResponse
     */
    public function apiResponse($data = null, bool $status = true): JsonResponse
    {
        $response = [
            'status' => $status,
            'data' => $data,
        ];
        return response()->json($response);
    }
}
