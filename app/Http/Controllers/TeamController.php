<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Pokemon;
use App\Models\Team;

class TeamController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $pokemons = Pokemon::all();
        return view('teams.create', compact('pokemons'));
    }

    public function store(TeamRequest $request): \Illuminate\Http\RedirectResponse
    {
        $team = new Team();
        $team->name = $request->name;
        $team->user_id = 1;//auth()->id();
        $team->save();

        $selectedPokemons = $request->input('selected_pokemons')
            ? explode(',', $request->input('selected_pokemons'))
            : [];
        $team->pokemons()->attach($selectedPokemons);

        return redirect()->route('teams.index')
            ->with('success', 'Team created successfully.');
    }

    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $team = Team::with('pokemons')->findOrFail($id);
        $pokemons = Pokemon::all();

        return view('teams.edit', compact('team', 'pokemons'));
    }

    public function update(TeamRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $team = Team::findOrFail($id);
        $team->name = $request->name;
        $team->save();

        $selectedPokemons = $request->input('selected_pokemons')
            ? explode(',', $request->input('selected_pokemons'))
            : [];
        $team->pokemons()->sync($selectedPokemons);

        return redirect()->route('teams.index')
            ->with('success', 'Team updated successfully.');
    }

    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $team = Team::findOrFail($id);
        return view('teams.show', compact('team'));
    }
}
