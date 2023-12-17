<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EquipoController extends Controller
{

    public function index()
    {
        $equipo = Equipo::all();

        return response()->json([
            "results"=> $equipo
        ], Response::HTTP_OK);
    }


    public function store(Request $request)
    {

        // Validar la solicitud
        $request->validate([
            'nombre' => 'required|string|max:255',
            'entrenadores_id' => 'required|exists:entrenadores,id',
        ]);

        // Obtener el entrenador
        $entrenador = Entrenador::findOrFail($request->entrenadores_id);

        // Crear un nuevo equipo vinculado al entrenador
        $equipo = $entrenador->equipos()->create([
            'nombre' => $request->nombre
        ]);

        // Devolver una respuesta
        return response()->json([
            'message' => 'Equipo creado exitosamente',
            'equipo' => $equipo
        ], 201);
    }
}
