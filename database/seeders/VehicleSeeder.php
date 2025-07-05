<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::create([
            'user_id' => 3,
            'threshold_id' => 6,
            'rfid' => "4274111603",
            'license_plate' => 'W 3125 JB',
            'category' => 'Mobil Penumpang',
            'brand' => 'Toyota Alphard',
            'production_year' => "2017",
            'fuel' => 'Bensin',
            'color' => 'Hitam',
            'chassis_number' => strtoupper(Str::random(16)),
            'identity' => Str::random(10),
        ]);

        Vehicle::create([
            'user_id' => 2,
            'threshold_id' => 4,
            'rfid' => "6773883",
            'license_plate' => 'L 2451 NDJ',
            'category' => 'Sepeda Motor',
            'brand' => 'Honda Scoopy',
            'production_year' => "2022",
            'fuel' => 'Bensin',
            'color' => 'Abu Abu',
            'chassis_number' => strtoupper(Str::random(16)),
            'identity' => Str::random(10),
        ]);

        Vehicle::create([
            'user_id' => 2,
            'threshold_id' => 4,
            'rfid' => "6773883",
            'license_plate' => 'B 4326 RI',
            'category' => 'Sepeda Motor',
            'brand' => 'Honda Stylo',
            'production_year' => "2024",
            'fuel' => 'Bensin',
            'color' => 'Hitam',
            'chassis_number' => strtoupper(Str::random(16)),
            'identity' => Str::random(10),
        ]);

        Vehicle::create([
            'user_id' => 2,
            'threshold_id' => 7,
            'rfid' => "6773883",
            'license_plate' => 'B 7392 BD',
            'category' => 'Mobil Penumpang',
            'brand' => 'Toyota Veloz',
            'production_year' => "2024",
            'fuel' => 'Bensin',
            'color' => 'Hitam',
            'chassis_number' => strtoupper(Str::random(16)),
            'identity' => Str::random(10),
        ]);

        Vehicle::create([
            'user_id' => 2,
            'threshold_id' => 8,
            'rfid' => "6773883",
            'license_plate' => 'S 7195 GI',
            'category' => 'Mobil Barang',
            'brand' => 'Suzuki Carry',
            'production_year' => "2006",
            'fuel' => 'Bensin',
            'color' => 'Hitam',
            'chassis_number' => strtoupper(Str::random(16)),
            'identity' => Str::random(10),
        ]);

        Vehicle::create([
            'user_id' => 2,
            'threshold_id' => 9,
            'rfid' => "6773883",
            'license_plate' => 'L 7382 SS',
            'category' => 'Mobil Barang',
            'brand' => 'Daihatsu Grandmax',
            'production_year' => "2016",
            'fuel' => 'Bensin',
            'color' => 'Hitam',
            'chassis_number' => strtoupper(Str::random(16)),
            'identity' => Str::random(10),
        ]);


        Vehicle::create([
            'user_id' => 2,
            'threshold_id' => 10,
            'rfid' => "6773883",
            'license_plate' => 'L 7382 SS',
            'category' => 'Mobil Barang',
            'brand' => 'Wuling Confero Blindvan',
            'production_year' => "2019",
            'fuel' => 'Bensin',
            'color' => 'Abu Abu',
            'chassis_number' => strtoupper(Str::random(16)),
            'identity' => Str::random(10),
        ]);
    }
}
