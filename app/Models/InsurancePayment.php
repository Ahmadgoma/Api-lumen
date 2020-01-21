<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsurancePayment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vehicle_id', 'contract_date', 'expiration_date', 'amount'
    ];
}
