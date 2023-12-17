<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Models\Pokemon;
use Symfony\Component\HttpFoundation\Response;

class PokemonController extends Controller
{
    public function importPokemonData()
    {
        // Configuracion para ignorar la verificacion del certificado SSL
        try {
            $client = new Client([
                'verify' => false, 
            ]);

            $response = $client->get('https://pokeapi.co/api/v2/pokemon?limit=15');
            $pokemonData = json_decode($response->getBody()->getContents(), true);

            foreach ($pokemonData['results'] as $result) {
                $pokemonDetailsResponse = $client->get($result['url']);
                $pokemonDetails = json_decode($pokemonDetailsResponse->getBody()->getContents(), true);

                // Guardar el pokemon
                $pokemon = new Pokemon();
                $pokemon->nombre = $pokemonDetails['name'];
                $pokemon->tipo = $pokemonDetails['types'][0]['type']['name']; 
                $pokemon->save();
            }

            return response()->json(['message' => 'Datos de Pokemon importados correctamente.']);
        } catch (RequestException $e) {
            // Manejar la excepcion
            return response()->json(['error' => 'Error al importar datos de Pokemon.']);
        }
    }

    public function index(){
        $pokemones = Pokemon::all();
        return response()->json([
            "result" => $pokemones
        ], Response::HTTP_OK);
    }
}
