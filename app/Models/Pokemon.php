<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemons';

    public function type1()
    {
        return $this->belongsTo(Type::class, 'type1_id');
    }

    public function type2()
    {
        return $this->belongsTo(Type::class, 'type2_id');
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}

