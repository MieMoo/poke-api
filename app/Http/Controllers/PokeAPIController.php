<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokeAPIController extends Controller
{
    public function search(Request $request)
    {
        $name = $request->query('name');

        if (!$name) {
            return view('pokedisplay'); // Show empty search page
        }

        $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$name}")->json();

        if (!$response) {
            return response()->json(['error' => 'Pokémon not found'], 404);
        }

        $data = $response;

        // Extract name, types, and sprite
        $pokemon = [
            'name' => ucfirst($data['name']), // Capitalize first letter
            'types' => array_map(fn($t) => ucfirst($t['type']['name']), $data['types']),
            'sprite' => $data['sprites']['front_default'],
        ];

        return view('pokedisplay', compact('pokemon'));
    }
}
