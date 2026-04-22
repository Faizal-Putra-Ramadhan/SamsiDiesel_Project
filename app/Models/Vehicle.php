<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'user_id',
        'brand',
        'model',
        'plate_number',
        'last_service_date',
        'oil_type',
        'next_service_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function serviceHistories()
    {
        return $this->hasMany(ServiceHistory::class);
    }
}
