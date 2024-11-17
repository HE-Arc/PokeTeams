<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Pokemon;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $team->user_id = auth()->id();
        $team->save();

        $selectedPokemons = $this->createSelectedPokemonsArray($request);

        $team->pokemons()->attach($selectedPokemons);

        return redirect()->route('teams.index')
            ->with('success', 'Team created successfully.');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);

        if ($this->isNotTheCurrentUser($team->user_id)) {
            return redirect()->route('teams.index')
                ->with('error', 'You do not have permission to edit this team.');
        }

        $pokemons = Pokemon::all();
        return view('teams.edit', compact('team', 'pokemons'));
    }

    public function update(TeamRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $team = Team::findOrFail($id);

        if ($this->isNotTheCurrentUser($team->user_id)) {
            return redirect()->route('teams.index')
                ->with('error', 'You do not have permission to update this team.');
        }

        $team->name = $request->name;
        $team->save();

        $selectedPokemons = $this->createSelectedPokemonsArray($request);
        $team->pokemons()->sync($selectedPokemons);

        return redirect()->route('teams.index')
            ->with('success', 'Team updated successfully.');
    }

    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $team = Team::findOrFail($id);
        return view('teams.show', compact('team'));
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $team = Team::findOrFail($id);

        if ($this->isNotTheCurrentUser($team->user_id)) {
            return redirect()->route('teams.index')
                ->with('error', 'You do not have permission to delete this team.');
        }

        $team->delete();

        return redirect()->route('teams.index')
            ->with('success', 'Team deleted successfully.');
    }

    public function addPokemon(Pokemon $pokemon, Team $team)
    {
        if ($this->isNotTheCurrentUser($team->user_id)) {
            return redirect()->back()
                ->with('error', 'You do not have permission to update this team.');
        }

        if ($team->isTeamFull()) {
            return redirect()->back()
                ->with('error', 'The team already has 6 Pokémon.');
        }

        if ($team->isPokemonInTheTeam($pokemon)) {
            return redirect()->back()
                ->with('error', 'This Pokémon is already in the team.');
        }

        $team->addPokemon($pokemon);

        return redirect()->back()
            ->with('success', 'Pokémon added to the team successfully!');
    }



    public function addPokemonForm(Pokemon $pokemonToAdd): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $teamsOfUser = auth()->user()->teamsNotFull;
        return view('teams.add-pokemon', compact('teamsOfUser', 'pokemonToAdd'));
    }

    private function createSelectedPokemonsArray(TeamRequest $request): array
    {
        $selectedPokemons = $request->input('selected_pokemons', '');
        return !empty($selectedPokemons) ? explode(',', $selectedPokemons) : [];
    }

    private function isNotTheCurrentUser($user_id) {
        return $user_id !== auth()->id();
    }

}
