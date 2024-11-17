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

}

