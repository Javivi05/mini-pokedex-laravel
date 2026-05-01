<?php

namespace Database\Seeders;

use App\Models\Entrenador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrenadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Entrenador::create([
            'nombre' => 'Ash Ketchum',
            'ciudad' => 'Kanto',
            'edad' => '10',
        ]);

        Entrenador::create([
            'nombre' => 'Misty',
            'ciudad' => 'Kanto',
            'edad' => '10',
        ]);

        Entrenador::create([
            'nombre' => 'Liko',
            'ciudad' => 'Paldea',
            'edad' => '12',
        ]);
    }
}
