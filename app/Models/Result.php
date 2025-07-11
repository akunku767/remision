<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'vehicle_id',
        'tested_at',
        'O2',
        'CO2',
        'CO',
        'HC',
        'reference_number',
        'identity',
    ];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }
}
