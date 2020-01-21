<?php

namespace App\Repositories;

interface VehicleRepositoryInterface
{
    /**
     * @param string $orderBy
     * @param string $sortBy
     * @param string $search
     * @param string $type
     * @return array
     */
    public function all(string $orderBy = 'created_at', string $sortBy = 'asc', string $search = '', string $type = '', int $limit = -1): array;
}
