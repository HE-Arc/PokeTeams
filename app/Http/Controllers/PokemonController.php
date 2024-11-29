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

        if (isset($request->name) && !empty($request->name)) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if (isset($request->type1) && !empty($request->type1) && isset($request->type2) && !empty($request->type2)) {
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
            if (isset($request->type1) && !empty($request->type1)) {
                $query->where(function ($q) use ($request) {
                    $q->where('type1_id', $request->type1)
                        ->orWhere('type2_id', $request->type1);
                });
            }
            if (isset($request->type2) && !empty($request->type2)) {
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
        $types = Type::all();
        $typeColors = $types->pluck('color', 'name');

        $groupedResistances = [
            '0' => [],
            '0.25' => [],
            '0.5' => [],
            '1' => [],
            '2' => [],
            '4' => [],
        ];
        foreach ($pokemon->resistances() as $type => $res) {
            $groupedResistances[(string)$res][] = $type;
        }

        return view('pokemons.show', compact('pokemon', 'types', 'typeColors', 'groupedResistances'));
    }
}
