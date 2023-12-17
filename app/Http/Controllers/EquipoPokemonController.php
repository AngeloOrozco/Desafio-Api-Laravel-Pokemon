<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Pokemon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EquipoPokemonController extends Controller
{
    public function index()
    {
        $equipos = Equipo::with(['pokemones' => function ($query) {
            $query->orderBy('equipos_pokemones.orden');
        }])->get();
    
        return response()->json([
            'results' => $equipos,
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'orden' => 'required|integer|min:1',
            'equipos_id' => 'required|exists:equipos,id',
            'pokemones_id' => 'required|exists:pokemones,id',
        ]);

        // Verificar límite de 3 pokemones por equipo
        $equipo = Equipo::findOrFail($request->equipos_id);
        if ($equipo->pokemones()->count() >= 3) {
            return response()->json([
                'error' => 'El equipo ya tiene 3 pokemones, no se pueden agregar más.',
            ], Response::HTTP_BAD_REQUEST);
        }

        // Verificar si ya existe el mismo orden para el equipo
        $ordenExistente = $equipo->pokemones()->wherePivot('orden', $request->orden)->exists();
        if ($ordenExistente) {
            return response()->json([
                'error' => 'Ya existe un Pokémon con el mismo orden en este equipo.',
            ], Response::HTTP_BAD_REQUEST);
        }

        // Crear la relación en la tabla equipos_pokemones
        $pokemon = Pokemon::findOrFail($request->pokemones_id);
        $equipo->pokemones()->attach($pokemon, ['orden' => $request->orden]);

        // Devolver una respuesta
        return response()->json([
            'message' => 'Relación creada exitosamente',
        ], Response::HTTP_CREATED);
    }
}
