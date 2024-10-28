<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pokemon;

class PokemonSeeder extends Seeder
{
    public function run(): void
    {
        Pokemon::create([
            'name' => 'Pikachu',
            'type1_id' => 1,  // Electric
            'type2_id' => null,
        ]);

        Pokemon::create([
            'name' => 'Charizard',
            'type1_id' => 2,  // Fire
            'type2_id' => 3,  // Flying
        ]);

        Pokemon::create([
            'name' => 'Bulbasaur',
            'type1_id' => 4,  // Grass
            'type2_id' => 5,  // Poison
        ]);

        Pokemon::create([
            'name' => 'Squirtle',
            'type1_id' => 6,  // Water
            'type2_id' => null,
        ]);

        Pokemon::create([
            'name' => 'Butterfree',
            'type1_id' => 7,  // Bug
            'type2_id' => 3,  // Flying
        ]);

        Pokemon::create([
            'name' => 'Jigglypuff',
            'type1_id' => 8,  // Normal
            'type2_id' => 14, // Fairy
        ]);

        Pokemon::create([
            'name' => 'Gengar',
            'type1_id' => 13, // Ghost
            'type2_id' => 9,  // Psychic
        ]);

        Pokemon::create([
            'name' => 'Onix',
            'type1_id' => 10, // Rock
            'type2_id' => 11, // Ground
        ]);

        Pokemon::create([
            'name' => 'Alakazam',
            'type1_id' => 9,  // Psychic
            'type2_id' => null,
        ]);

        Pokemon::create([
            'name' => 'Machamp',
            'type1_id' => 18, // Fighting
            'type2_id' => null,
        ]);

        Pokemon::create([
            'name' => 'Lapras',
            'type1_id' => 16, // Ice
            'type2_id' => 6,  // Water
        ]);

        Pokemon::create([
            'name' => 'Dragonite',
            'type1_id' => 12, // Dragon
            'type2_id' => 3,  // Flying
        ]);

        Pokemon::create([
            'name' => 'Snorlax',
            'type1_id' => 8,  // Normal
            'type2_id' => null,
        ]);

        Pokemon::create([
            'name' => 'Gyarados',
            'type1_id' => 6,  // Water
            'type2_id' => 3,  // Flying
        ]);

        Pokemon::create([
            'name' => 'Vaporeon',
            'type1_id' => 6,  // Water
            'type2_id' => null,
        ]);

        Pokemon::create([
            'name' => 'Jolteon',
            'type1_id' => 1,  // Electric
            'type2_id' => null,
        ]);

        Pokemon::create([
            'name' => 'Flareon',
            'type1_id' => 2,  // Fire
            'type2_id' => null,
        ]);

        Pokemon::create([
            'name' => 'Mewtwo',
            'type1_id' => 9,  // Psychic
            'type2_id' => null,
        ]);

        Pokemon::create([
            'name' => 'Steelix',
            'type1_id' => 15, // Steel
            'type2_id' => 11, // Ground
        ]);

        Pokemon::create([
            'name' => 'Umbreon',
            'type1_id' => 17, // Dark
            'type2_id' => null,
        ]);
    }
}
