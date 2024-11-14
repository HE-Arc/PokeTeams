<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;


use App\Models\Pokemon;

class PokemonController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $pokemons = Pokemon::paginate(20);
        return view('pokemons.index', compact('pokemons'));
    }

    public function show(Pokemon $pokemon): \Illuminate\Contracts\View\View
    {
        return view('pokemons.show', compact('pokemon'));
    }
}
