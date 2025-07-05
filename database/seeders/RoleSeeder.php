<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Super Admin',
            'identity' => Str::random(10),
        ]);

        Role::create([
            'name' => 'Admin',
            'identity' => Str::random(10),
        ]);

        Role::create([
            'name' => 'User',
            'identity' => Str::random(10),
        ]);
    }
}
