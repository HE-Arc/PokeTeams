<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\TypeRatio;
use Illuminate\Database\Seeder;
use App\Models\Pokemon;

class TypeRatioSeeder extends Seeder
{
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/types_ratios.csv"), "r");
        $firstLine = true;
        while (($row = fgetcsv($csvFile)) !== false) {
            if (!$firstLine) {
                TypeRatio::create([
                    'type1' => Type::where('name', '=', $row[0])->get()->first()->id,
                    'ratio' => $row[1],
                    'type2' => Type::where('name', '=', $row[2])->get()->first()->id,
                ]);
            }
            $firstLine = false;
        }
        fclose($csvFile);
    }
}
