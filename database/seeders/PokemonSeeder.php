<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use App\Models\Pokemon;

class PokemonSeeder extends Seeder
{
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/pokemonDB_dataset.csv"), "r");
        $firstLine = true;
        while (($row = fgetcsv($csvFile)) !== false) {
            $types = explode(', ', $row[1]);
            if (!$firstLine) {
                Pokemon::create([
                    'name' => $row[0],
                    'type1_id' => Type::where('name', '=', $types[0])->get()->first()->id,
                    'type2_id' => count($types) > 1 ? Type::where('name', '=', $types[1])->get()->first()->id : null,
                    'base_hp' => $row[14],
                    'min_hp' => $row[15],
                    'max_hp' => $row[16],
                    'base_attack' => $row[17],
                    'min_attack' => $row[18],
                    'max_attack' => $row[19],
                    'base_defense' => $row[20],
                    'min_defense' => $row[21],
                    'max_defense' => $row[22],
                    'base_special_attack' => $row[23],
                    'min_special_attack' => $row[24],
                    'max_special_attack' => $row[25],
                    'base_special_defense' => $row[26],
                    'min_special_defense' => $row[27],
                    'max_special_defense' => $row[28],
                    'base_speed' => $row[29],
                    'min_speed' => $row[30],
                    'max_speed' => $row[31],
                ]);
            }
            $firstLine = false;
        }
        fclose($csvFile);
    }
}
