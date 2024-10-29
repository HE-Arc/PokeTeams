<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use App\Models\Pokemon;

class PokemonSeeder extends Seeder
{
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/pokemon-data.csv"), "r");
        $firstLine = true;
        while (($row = fgetcsv($csvFile, null, ";")) !== false) {
            $types = explode(',', trim($row[1], " []"));
            if (!$firstLine) {
                Pokemon::create([
                    'name' => $row[0],
                    'type1_id' => Type::where('name', '=', trim($types[0], " '"))->get()->first()->id,
                    'type2_id' => count($types) > 1 ? Type::where('name', '=', trim($types[1], " '"))->get()->first()->id : null,
                ]);
            }
            $firstLine = false;
        }
        fclose($csvFile);
    }
}
