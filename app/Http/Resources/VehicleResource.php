<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'rfid' => $this->rfid,
            'license_plate' => $this->license_plate,
            'category' => $this->category,
            'brand' => $this->brand,
            'production_year' => $this->production_year,
            'fuel' => $this->fuel,
            'color' => $this->color,
            'chassis_number' => $this->chassis_number,
            'identity' => $this->identity,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
