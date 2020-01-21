<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vehicle_id', 'start_date', 'end_date', 'invoice_number', 'purchase_order_number', 'status', 'discount', 'tax', 'total'
    ];
}
