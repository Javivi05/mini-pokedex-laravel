<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use Illuminate\Http\Request;

class EntrenadorController extends Controller
{
    //GET /api/entrenador - Listar todos los Entrenadores
    public function index()
    {
        $entrenadores = Entrenador::with('pokemon')->get(); // Incluye los pokemon de cada entrenador
        return response()->json($entrenadores);
    }

    //POST /api/entrenador - Crear un nuevo entrenador
    public function store(Request $request)
    {
        $validado= $request->validate([
            'nombre' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'edad' => 'required|integer|min:1|max:99'
        ]);

        $entrenador = Entrenador::create($validado);
        return response()->json($entrenador, 201);
    }

    // PUT/PATCH /api/entrenador/{id} - Actualizar un entrenador
    public function update(Request $request, string $id)
    {
        $entrenador = Entrenador::findOrFail($id);
        $validado= $request->validate([
            'nombre' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'edad' => 'required|integer|min:1|max:99'
        ]);
        $entrenador->update($validado);
        return response()->json($entrenador);
    }

    // DELETE /api/entrenador/{id} - Eliminar un entrenador
    public function destroy(string $id)
    {
        $entrenador = Entrenador::findOrFail($id);
        $entrenador->delete();
        return response()->json(['message' => 'Entrenador eliminado correctamente'], 200);
    }
}
