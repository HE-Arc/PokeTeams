<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use App\Models\Type;

class PokemonController extends Controller
{
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $query = Pokemon::query();

        if (isset($request->namefilter) && !empty($request->namefilter)) {
            $query->where('name', 'LIKE', '%' . $request->namefilter . '%');
        }

        if (isset($request->type1filter) && !empty($request->type1filter) && isset($request->type2filter) && !empty($request->type2filter)) {
            if ($request->type2filter == "None") {
                $query->where(function ($q) use ($request) {
                    $q->where('type1_id', $request->type1filter)
                        ->whereNull('type2_id');
                });
            } else {
                $query->where(function ($q) use ($request) {
                    $q->where(function ($q2) use ($request) {
                        $q2->where('type1_id', $request->type1filter)
                            ->where('type2_id', $request->type2filter);
                    })->orWhere(function ($q2) use ($request) {
                        $q2->where('type1_id', $request->type2filter)
                            ->where('type2_id', $request->type1filter);
                    });
                });
            }
        } else {
            if (isset($request->type1filter) && !empty($request->type1filter)) {
                $query->where('type1_id', $request->type1filter)
                    ->orWhere('type2_id', $request->type1filter);
            }
            if (isset($request->type2filter) && !empty($request->type2filter)) {
                if ($request->type2filter == "None") {
                    $query->where('type2_id', null);
                } else {
                    $query->where('type2_id', $request->type2filter);
                }
            }
        }

        $pokemons = $query->paginate(20);
        $types = Type::all();
        return view('pokemons.index', compact('pokemons', 'types'));
    }

    public function show(Pokemon $pokemon): \Illuminate\Contracts\View\View
    {
        return view('pokemons.show', compact('pokemon'));
    }
}
