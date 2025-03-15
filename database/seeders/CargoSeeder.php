<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cargo::create([
        //     "cargo"=>"Backend"
        // ]);
        // Cargo::create([
        //     "cargo"=>"Frontend"
        // ]);
        // Cargo::create([
        //     "cargo"=>"Designer"
        // ]);
        // Cargo::create([
        //     "cargo"=>"DBA"
        // ]);

        Cargo::factory(10)->create();
    }
}
