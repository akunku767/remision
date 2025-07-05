<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Threshold extends Model
{
    protected $fillable = [
        'category',
        'start_year',
        'notation',
        'end_year',
        'CO',
        'HC',
        'desc',
        'identity'
    ];

    public function vehicle()
    {
        return $this->hasMany(Vehicle::class, 'threshold_id');
    }
}
