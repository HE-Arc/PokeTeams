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

    public function resistances()
    {
        $ratiosType1 = $this->type1()->first()->defenseRatios()->get();
        $ratiosType2 = $this->type2() ? $this->type2()->first() : null;

        $finalRatios = [];

        if ($ratiosType2 != null) {
            $ratiosType2 = $ratiosType2->defenseRatios()->get();
            foreach ($ratiosType1 as $index => $ratio1) {
                $finalRatios[Type::find($ratio1->type1)->name] = $ratio1->ratio * $ratiosType2[$index]->ratio;
            }
        }
        else{
            foreach ($ratiosType1 as $ratio1) {
                $finalRatios[Type::find($ratio1->type1)->name] = $ratio1->ratio;
            }
        }
        return $finalRatios;
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

