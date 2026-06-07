<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    protected $fillable = [
        'service_history_id',
        'type',
        'name',
        'price',
    ];

    public function serviceHistory()
    {
        return $this->belongsTo(ServiceHistory::class);
    }}
