<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = ['name', 'user_id'];

    public function pokemons()
    {
        return $this->belongsToMany(Pokemon::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

