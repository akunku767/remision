<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => '1',
            'name' => 'Superman',
            'phone' => '08762824434',
            'email' => 'superadmin@remision.com',
            'password' => bcrypt('12345678'),
            'identity' => Str::random(10),
        ]);

        User::create([
            'role_id' => '2',
            'name' => 'Kang Admin',
            'phone' => '08762824433',
            'email' => 'admin@remision.com',
            'password' => bcrypt('12345678'),
            'identity' => Str::random(10),
        ]);

        User::create([
            'role_id' => '3',
            'name' => 'Rifqi',
            'phone' => '08762824431',
            'email' => 'mrifqi767@gmail.com',
            'password' => bcrypt('12345678'),
            'identity' => Str::random(10),
        ]);
    }
}
