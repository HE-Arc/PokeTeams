<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = ['name', 'user_id'];

    public static function create(array $array)
    {
    }

    public function pokemons()
    {
        return $this->belongsToMany(Pokemon::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addPokemon(Pokemon $pokemon) {
        $this->pokemons()->attach($pokemon->id);
    }

    public function isTeamFull(): bool {
        return $this->pokemons()->count() >= 6;
    }

    public function isPokemonInTheTeam(Pokemon $pokemon): bool
    {
        return $this->pokemons->contains($pokemon->id);
    }

    public function categorizedResistances()
    {
        $globalRatios = [];
        $pokemonCount = $this->pokemons()->count();

        if ($pokemonCount == 0) {
            return ['Globaly Weak' => [], 'Globaly Resistant' => []];
        }

        foreach ($this->pokemons as $pokemon) {
            $pokemonResistances = $pokemon->resistances();

            foreach ($pokemonResistances as $type => $ratio) {
                if (!isset($globalRatios[$type])) {
                    $globalRatios[$type] = 0;
                }
                $globalRatios[$type] += $ratio;
            }
        }

        $categorized = ['Globaly Weak' => [], 'Globaly Resistant' => []];

        foreach ($globalRatios as $type => $totalRatio) {
            $averageRatio = $totalRatio / $pokemonCount;

            if ($averageRatio > 1) {
                $categorized['Globaly Weak'][$type] = $averageRatio;
            } else {
                $categorized['Globaly Resistant'][$type] = $averageRatio;
            }
        }
        return $categorized;
    }
}

