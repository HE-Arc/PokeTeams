<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        Type::create(['name' => 'Electric', 'color' => '#F8D030']);
        Type::create(['name' => 'Fire', 'color' => '#F08030']);
        Type::create(['name' => 'Flying', 'color' => '#A890F0']);
        Type::create(['name' => 'Grass', 'color' => '#78C850']);
        Type::create(['name' => 'Poison', 'color' => '#A040A0']);
        Type::create(['name' => 'Water', 'color' => '#6890F0']);
        Type::create(['name' => 'Bug', 'color' => '#A8B820']);
        Type::create(['name' => 'Normal', 'color' => '#A8A878']);
        Type::create(['name' => 'Psychic', 'color' => '#F85888']);
        Type::create(['name' => 'Rock', 'color' => '#B8A038']);
        Type::create(['name' => 'Ground', 'color' => '#E0C068']);
        Type::create(['name' => 'Dragon', 'color' => '#7038F8']);
        Type::create(['name' => 'Ghost', 'color' => '#705898']);
        Type::create(['name' => 'Fairy', 'color' => '#EE99AC']);
        Type::create(['name' => 'Steel', 'color' => '#B8B8D0']);
        Type::create(['name' => 'Ice', 'color' => '#98D8D8']);
        Type::create(['name' => 'Dark', 'color' => '#705848']);
        Type::create(['name' => 'Fighting', 'color' => '#C03028']);
    }
}
