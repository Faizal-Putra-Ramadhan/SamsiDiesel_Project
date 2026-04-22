<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceHistory extends Model
{
    protected $fillable = [
        'vehicle_id',
        'service_date',
        'service_type',
        'notes',
        'technician_name',
        'status',
        'invoice_status',
        'total_cost',
        'spareparts',
        'paid_at',
        'next_service_date',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function details()
    {
        return $this->hasMany(ServiceDetail::class);
    }
}
