<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    public function pokemons1()
    {
        return $this->hasMany(Pokemon::class, 'type1_id');
    }

    public function pokemons2()
    {
        return $this->hasMany(Pokemon::class, 'type2_id');
    }

    public function defenseRatios()
    {
        return $this->hasMany(TypeRatio::class, 'type2');
    }

    public function attackRatios()
    {
        return  $this->hasMany(TypeRatio::class, 'type1');
    }
}
