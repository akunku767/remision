<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Result;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Result::create([
            'vehicle_id' => '1',
            'tested_at' => Carbon::now()->subDays(2),
            'O2' => '0.4',
            'CO2' => '0.3',
            'CO' => '3',
            'HC' => '950',
            'reference_number' => mt_rand(1000000000, 9999999999),
            'identity' => Str::random(10),
        ]);

        Result::create([
            'vehicle_id' => '2',
            'tested_at' => Carbon::now()->subDays(1),
            'O2' => '0.6',
            'CO2' => '1.2',
            'CO' => '3',
            'HC' => '1000',
            'reference_number' => mt_rand(1000000000, 9999999999),
            'identity' => Str::random(10),
        ]);

        Result::create([
            'vehicle_id' => '3',
            'tested_at' => Carbon::now(),
            'O2' => '0.4',
            'CO2' => '0.9',
            'CO' => '2',
            'HC' => '950',
            'reference_number' => mt_rand(1000000000, 9999999999),
            'identity' => Str::random(10),
        ]);
    }
}
