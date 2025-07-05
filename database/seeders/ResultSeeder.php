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
            'CO' => '3',
            'HC' => '950',
            'reference_number' => mt_rand(1000000000, 9999999999),
            'identity' => Str::random(10),
        ]);

        Result::create([
            'vehicle_id' => '2',
            'tested_at' => Carbon::now()->subDays(1),
            'CO' => '3',
            'HC' => '1000',
            'reference_number' => mt_rand(1000000000, 9999999999),
            'identity' => Str::random(10),
        ]);

        Result::create([
            'vehicle_id' => '3',
            'tested_at' => Carbon::now(),
            'CO' => '2',
            'HC' => '950',
            'reference_number' => mt_rand(1000000000, 9999999999),
            'identity' => Str::random(10),
        ]);
    }
}
