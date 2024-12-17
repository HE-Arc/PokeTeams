<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Pokemon;
use App\Models\Team;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $show_others = !empty($request->input('show-others'));
        if ($show_others) {
            $teams = Team::all();
        } else {
            $teams = Team::query()->where('user_id', Auth::id())->get();
        }
        return view('teams.index', compact('teams', 'show_others'));
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
        $team->pokemons()->sync($selectedPokemons);

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
        $types = Type::all();
        $typeColors = $types->pluck('color', 'name');

        $groupedResistances = $team->categorizedResistances();

        return view('teams.show', compact('team', 'groupedResistances', 'types', 'typeColors'));
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

    private function createSelectedPokemonsArray(TeamRequest $request): array
    {
        $selectedPokemons = $request->input('selected_pokemons', '');
        return !empty($selectedPokemons) ? explode(',', $selectedPokemons) : [];
    }

    private function isNotTheCurrentUser($user_id) {
        return $user_id !== auth()->id();
    }

}
