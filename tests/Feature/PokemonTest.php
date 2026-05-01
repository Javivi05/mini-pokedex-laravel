<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Pokemon;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PokemonTest extends TestCase
{
    use RefreshDatabase;

    private function crearEntrenador()
    {
        return DB::table('entrenadors')->insertGetId([
            'nombre' => 'Ash',
            'ciudad' => 'Pueblo Paleta',
            'edad' => 10,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
    public function test_crear_pokemon()
    {
        $entrenadorId = $this->crearEntrenador();
        $pokemon = Pokemon::create([
            'nombre' => 'Pikachu',
            'tipo' => 'Eléctrico',
            'nivel' => 5,
            'entrenador_id' => $entrenadorId
        ]);

        $this->assertDatabaseHas('pokemon', [
            'nombre' => 'Pikachu'
        ]);
    }

    public function test_actualizar_pokemon()
    {
        $entrenadorId = $this->crearEntrenador();
        $pokemon = Pokemon::create([
            'nombre' => 'Pikachu',
            'tipo' => 'Eléctrico',
            'nivel' => 5,
            'entrenador_id' => $entrenadorId
        ]);

        $pokemon->update([
            'nombre' => 'Raichu',
            'nivel' => 10
        ]);

        $this->assertDatabaseHas('pokemon', [
            'nombre' => 'Raichu',
            'nivel' => 10
        ]);
    }
    public function test_eliminar_pokemon()
    {
        $entrenadorId = $this->crearEntrenador();
        $pokemon = Pokemon::create([
            'nombre' => 'Pikachu',
            'tipo' => 'Eléctrico',
            'nivel' => 5,
            'entrenador_id' => $entrenadorId
        ]);

        $pokemon->delete();

        $this->assertDatabaseMissing('pokemon', [
            'nombre' => 'Pikachu'
        ]);
    }
    public function test_validacion_datos()
    {
        $response = $this->postJson('/api/pokemon', [
            'nombre' => '',
            'tipo' => '',
            'nivel' => 0,
            'entrenador_id' => null
        ]);

        $response->assertStatus(422);
    }
    public function test_obtener_lista_pokemon()
    {
        $entrenadorId = $this->crearEntrenador();

        Pokemon::create([
            'nombre' => 'Pikachu',
            'tipo' => 'Eléctrico',
            'nivel' => 5,
            'entrenador_id' => $entrenadorId
        ]);

        $response = $this->getJson('/api/pokemon');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    '*' => [
                        'id',
                        'nombre',
                        'tipo',
                        'nivel',
                        'entrenador_id'
                    ]
                ]);
    }
}