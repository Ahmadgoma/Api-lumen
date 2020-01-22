<?php

namespace App\Services;

use App\Repositories\VehicleRepositoryInterface;
use Illuminate\Http\Request;

class VehicleService implements VehicleServiceInterface
{
    /**
     * @var VehicleRepositoryInterface
     */
    private $VehicleRepository;

    /**
     * VehicleService constructor.
     * @param VehicleRepositoryInterface $vehicleRepository
     */
    public function __construct(VehicleRepositoryInterface $vehicleRepository)
    {
        $this->VehicleRepository = $vehicleRepository;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getVehicleExpenses(Request $request): array
    {
        $searchQueries = $this->getFilterQuery($request);
        $data['expenses'] = $this->VehicleRepository->all(
            $searchQueries['orderBy'],
            $searchQueries['sortBy'],
            $searchQueries['search'],
            $searchQueries['type'],
            $searchQueries['limit']
        );
        return $data;
    }

    /**
     * @param Request $request
     * @return array
     */
    private function getFilterQuery(Request $request): array
    {
        $searchQueries['orderBy'] = 'created_at';
        $searchQueries['sortBy'] = 'asc';
        $searchQueries['search'] = '';
        $searchQueries['type'] = '';
        $searchQueries['limit'] = -1;

        if (($request->has('orderBy') && $request->query('orderBy') == 'cost') ||
            ($request->has('orderBy') && $request->query('orderBy') == 'created_at'))
            $searchQueries['orderBy'] = $request->query('orderBy');
        if (($request->has('sortBy') && $request->query('sortBy') == 'desc') ||
            ($request->has('sortBy') && $request->query('sortBy') == 'asc'))
            $searchQueries['sortBy'] = $request->query('sortBy');
        if ($request->has('search'))
            $searchQueries['search'] = $request->query('search');
        if ($request->has('type'))
            $searchQueries['type'] = $request->query('type');
        if ($request->has('limit') && is_int($request->query('limit')))
            $searchQueries['limit'] = $request->query('limit');
        return $searchQueries;
    }
}
