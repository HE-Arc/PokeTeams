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

        if (!empty($request->name)) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if (!empty($request->type1) && !empty($request->type2)) {
            if ($request->type2 == "None") {
                $query->where(function ($q) use ($request) {
                    $q->where('type1_id', $request->type1)
                        ->whereNull('type2_id');
                });
            } else {
                $query->where(function ($q) use ($request) {
                    $q->where(function ($q2) use ($request) {
                        $q2->where('type1_id', $request->type1)
                            ->where('type2_id', $request->type2);
                    })->orWhere(function ($q2) use ($request) {
                        $q2->where('type1_id', $request->type2)
                            ->where('type2_id', $request->type1);
                    });
                });
            }
        } else {
            if (!empty($request->type1filter)) {
                $query->where(function ($q) use ($request) {
                    $q->where('type1_id', $request->type1)
                        ->orWhere('type2_id', $request->type1);
                });
            }
            if (!empty($request->type2)) {
                if ($request->type2 == "None") {
                    $query->where('type2_id', null);
                } else {
                    $query->where(function ($q) use ($request) {
                        $q->where('type2_id', $request->type2)
                            ->orWhere('type1_id', $request->type2);
                    });
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
