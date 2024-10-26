<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run()
    {
        Type::create(['name' => 'Electric']);
        Type::create(['name' => 'Fire']);
        Type::create(['name' => 'Flying']);
        Type::create(['name' => 'Grass']);
        Type::create(['name' => 'Poison']);
        Type::create(['name' => 'Water']);
        Type::create(['name' => 'Bug']);
        Type::create(['name' => 'Normal']);
        Type::create(['name' => 'Psychic']);
        Type::create(['name' => 'Rock']);
        Type::create(['name' => 'Ground']);
        Type::create(['name' => 'Dragon']);
        Type::create(['name' => 'Ghost']);
        Type::create(['name' => 'Fairy']);
        Type::create(['name' => 'Steel']);
        Type::create(['name' => 'Ice']);
        Type::create(['name' => 'Dark']);
        Type::create(['name' => 'Fighting']);
    }
}
