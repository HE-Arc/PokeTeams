<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $fillable = [
        'name',
        'type_1_id',
        'type_2_id',
        'base_hp',
        'base_attack',
        'base_defense',
        'base_special_attack',
        'base_special_defense',
        'base_speed',
        'sprite',
    ];

    protected $filters = [
        'name',
        'type_1_id',
        'type_2_id',
    ];

    protected $table = 'pokemons';

    public function type1(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Type::class, 'type1_id');
    }

    public function type2(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Type::class, 'type2_id');
    }

    public function teams(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }

    public static function getPokemonById($id)
    {
        return self::find($id);
    }
}

