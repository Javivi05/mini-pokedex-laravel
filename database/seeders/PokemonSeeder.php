<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pokemon::create([
            'nombre' => 'Pikachu',
            'tipo' => 'Eléctrico',
            'nivel' => '100',
            'entrenador_id' => '1'
        ]);

        Pokemon::create([
            'nombre' => 'Psyduck',
            'tipo' => 'Agua',
            'nivel' => '33',
            'entrenador_id' => '2'
        ]);

        Pokemon::create([
            'nombre' => 'Sprigatito',
            'tipo' => 'Planta',
            'nivel' => '16',
            'entrenador_id' => '3'
        ]);

        Pokemon::create([
            'nombre' => 'Bulbasaur',
            'tipo' => 'Planta',
            'nivel' => '32',
            'entrenador_id' => '1'
        ]);

        Pokemon::create([
            'nombre' => 'Staryu',
            'tipo' => 'Agua',
            'nivel' => '22',
            'entrenador_id' => '2'
        ]);

        Pokemon::create([
            'nombre' => 'Terapagos',
            'tipo' => 'Normal',
            'nivel' => '85',
            'entrenador_id' => '3'
        ]);
    }
}
