<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use App\Models\Pokemon;
use Illuminate\Http\Client\Request;
use Symfony\Component\Console\Input\Input;

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
