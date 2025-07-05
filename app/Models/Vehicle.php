<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'user_id',
        'threshold_id',
        'rfid',
        'license_plate',
        'category',
        'brand',
        'production_year',
        'fuel',
        'color',
        'chassis_number',
        'identity'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function threshold(){
        return $this->belongsTo(Threshold::class, 'threshold_id', 'id');
    }
}
