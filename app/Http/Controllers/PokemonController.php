<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    //GET /api/pokemon - Listar todos los Pokemon
    public function index()
    {
        $pokemons = Pokemon::with('entrenador')->get(); // Incluye los pokemon de cada Entrenador
        return response()->json($pokemons);
    }

    //POST /api/pokemon - Crear un nuevo pokemon
    public function store(Request $request)
    {
        $validado= $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'nivel' => 'required|integer|min:1|max:99',
            'entrenador_id' => 'required|exists:entrenadors,id'
        ]);

        $pokemon = Pokemon::create($validado);
        return response()->json($pokemon, 201);
    }

    // PUT/PATCH /api/pokemon/{id} - Actualizar un pokemon
    public function update(Request $request, string $id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $validado= $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'nivel' => 'required|integer|min:1|max:99',
            'entrenador_id' => 'required|exists:entrenadors,id'
        ]);
        $pokemon->update($validado);
        return response()->json($pokemon);
    }

    // DELETE /api/pokemon/{id} - Eliminar un Pokemon
    public function destroy(string $id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->delete();
        return response()->json(['message' => 'Pokemon eliminado correctamente'], 200);
    }
}
