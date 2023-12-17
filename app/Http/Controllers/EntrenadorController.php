<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrenador;
use Symfony\Component\HttpFoundation\Response;

class EntrenadorController extends Controller
{
    public function index()
    {
        $entrenadores = Entrenador::with('equipos')->get();
        
        return response()->json([
            'results' => $entrenadores,
        ], Response::HTTP_OK);
    }
    

    public function show($id)
    {
        $entrenador = Entrenador::with('equipos')->findOrFail($id);
    
        return response()->json([
            'result' => $entrenador,
        ], Response::HTTP_OK);
    }
    


    public function store(Request $request)
    {
        //validamos

        $request->validate([
            'nombre' => 'required|string|max:100',
        ]);

        //damos de alta en la DB

        $entrenador = Entrenador::create([
            "nombre" => $request->nombre
        ]);

        //devolvemos una respuesta

        return response()->json([
            "result" => $entrenador
        ], Response::HTTP_OK);
    }
}
