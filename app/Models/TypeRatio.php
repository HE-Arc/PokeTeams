<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeRatio extends Model
{
    protected $table = 'types_ratios';

    protected $fillable = ['type1', 'ratio', 'type2'];
}
