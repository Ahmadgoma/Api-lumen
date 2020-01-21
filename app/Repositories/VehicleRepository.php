<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class VehicleRepository implements VehicleRepositoryInterface
{
    /**
     * @param string $orderBy
     * @param string $sortBy
     * @param string $search
     * @param string $filter
     * @param int $limit
     * @return array
     */
    public function all(string $orderBy = 'created_at', string $sortBy = 'asc', string $search = '', string $filter = '', int $limit = -1): array
    {
        $table = DB::table('vehicles')
            ->join('services', 'vehicles.id', '=', 'services.vehicle_id')
            ->where('vehicles.name', 'LIKE', "%" . $search . "%")
            ->select('vehicles.id', 'vehicles.name  as vehicleName', 'vehicles.plate_number as plateNumber', DB::raw("'service' as type"),
                'services.total as cost', 'services.created_at as createdAt')
            ->having('type', 'LIKE', "%" . $filter . "%");

        $table2 = DB::table('vehicles')
            ->join('fuel_entries', 'vehicles.id', '=', 'fuel_entries.vehicle_id')
            ->where('vehicles.name', 'LIKE', "%" . $search . "%")
            ->select('vehicles.id', 'vehicles.name as vehicleName', 'vehicles.plate_number as plateNumber', DB::raw("'fuel' as type"),
                'fuel_entries.cost as cost', 'fuel_entries.entry_date as createdAt')
            ->having('type', 'LIKE', "%" . $filter . "%");

        $table3 = DB::table('vehicles')
            ->join('insurance_payments', 'vehicles.id', '=', 'insurance_payments.vehicle_id')
            ->where('vehicles.name', 'LIKE', "%" . $search . "%")
            ->select('vehicles.id', 'vehicles.name as vehicleName', 'vehicles.plate_number as plateNumber', DB::raw("'insurance' as type"),
                'insurance_payments.amount as cost', 'insurance_payments.contract_date as createdAt')
            ->having('type', 'LIKE', "%" . $filter . "%");

        return $table->union($table2)->union($table3)
            ->orderBy($orderBy, $sortBy)
            ->limit($limit)
            ->get()
            ->toArray();
    }
}
