<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        $pokemons = Pokemon::all();
        return view('teams.create', compact('pokemons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:30',
        ]);

        $team = Team::create([
            'name' => $request->name,
            'user_id' => 1,
        ]);

        $pokemonIds = array_filter(explode(',', $request->input('selected_pokemons')));

        if (!empty($pokemonIds)) {
            $team->pokemons()->attach($pokemonIds);
        }

        return redirect()->route('teams.index')->with('success', 'Team created successfully.');
    }
}
