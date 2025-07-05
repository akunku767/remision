<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Threshold;

class ThresholdSeeder extends Seeder
{
    /**
     * Run the database seeds,
     */
    public function run(): void
    {
        Threshold::create([
            'category' => 'Sepeda motor 2 langkah',
            'start_year' => null,
            'notation' => '<',
            'end_year' => 2010,
            'CO' => 4.5,
            'HC' => 6000,
            'desc' => 'Sepeda motor 2 tak',
            'identity' => Str::random(10),
        ]);

        Threshold::create([
            'category' => 'Sepeda motor 4 langkah',
            'start_year' => null,
            'notation' => '<',
            'end_year' => 2010,
            'CO' => 5.5,
            'HC' => 2200,
            'desc' => 'Sepeda motor 4 tak',
            'identity' => Str::random(10),
        ]);

        Threshold::create([
            'category' => 'Sepeda motor',
            'start_year' => 2010,
            'notation' => '-',
            'end_year' => 2016,
            'CO' => 4,
            'HC' => 1800,
            'desc' => 'Sepeda motor modern pada umumnya',
            'identity' => Str::random(10),
        ]);

        Threshold::create([
            'category' => 'Sepeda motor',
            'start_year' => null,
            'notation' => '>',
            'end_year' => 2016,
            'CO' => 3,
            'HC' => 1000,
            'desc' => 'Sepeda motor modern pada umumnya',
            'identity' => Str::random(10),
        ]);

        Threshold::create([
            'category' => 'Kategori M',
            'start_year' => null,
            'notation' => '<',
            'end_year' => 2007,
            'CO' => 4,
            'HC' => 1000,
            'desc' => 'Kendaraan bermotor roda empat atau lebih untuk angkutan orang',
            'identity' => Str::random(10),
        ]);

        Threshold::create([
            'category' => 'Kategori M',
            'start_year' => 2007,
            'notation' => '-',
            'end_year' => 2018,
            'CO' => 1,
            'HC' => 150,
            'desc' => 'Kendaraan bermotor roda empat atau lebih untuk angkutan orang',
            'identity' => Str::random(10),
        ]);

        Threshold::create([
            'category' => 'Kategori M',
            'start_year' => null,
            'notation' => '>',
            'end_year' => 2018,
            'CO' => 0.5,
            'HC' => 100,
            'desc' => 'Kendaraan bermotor roda empat atau lebih untuk angkutan orang',
            'identity' => Str::random(10),
        ]);

        Threshold::create([
            'category' => 'Kategori N',
            'start_year' => null,
            'notation' => '<',
            'end_year' => 2007,
            'CO' => 4,
            'HC' => 1100,
            'desc' => 'Kendaraan bermotor roda empat atau lebih untuk angkutan barang',
            'identity' => Str::random(10),
        ]);

        Threshold::create([
            'category' => 'Kategori N',
            'start_year' => 2007,
            'notation' => '-',
            'end_year' => 2018,
            'CO' => 1,
            'HC' => 200,
            'desc' => 'Kendaraan bermotor roda empat atau lebih untuk angkutan barang',
            'identity' => Str::random(10),
        ]);

        Threshold::create([
            'category' => 'Kategori N',
            'start_year' => null,
            'notation' => '>',
            'end_year' => 2018,
            'CO' => 0.5,
            'HC' => 150,
            'desc' => 'Kendaraan bermotor roda empat atau lebih untuk angkutan barang',
            'identity' => Str::random(10),
        ]);

        Threshold::create([
            'category' => 'Kategori O',
            'start_year' => null,
            'notation' => '<',
            'end_year' => 2007,
            'CO' => 4,
            'HC' => 1100,
            'desc' => 'Kendaraan bermotor roda empat atau lebih untuk angkutan barang',
            'identity' => Str::random(10),
        ]);

        Threshold::create([
            'category' => 'Kategori O',
            'start_year' => 2007,
            'notation' => '-',
            'end_year' => 2018,
            'CO' => 1,
            'HC' => 200,
            'desc' => 'Kendaraan bermotor roda empat atau lebih untuk angkutan barang',
            'identity' => Str::random(10),
        ]);

        Threshold::create([
            'category' => 'Kategori O',
            'start_year' => null,
            'notation' => '>',
            'end_year' => 2018,
            'CO' => 0.5,
            'HC' => 150,
            'desc' => 'Kendaraan bermotor roda empat atau lebih untuk angkutan barang',
            'identity' => Str::random(10),
        ]);
    }
}
