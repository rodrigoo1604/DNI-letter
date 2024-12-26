<?php

namespace Database\Seeders;

use App\Models\DniLetter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DniLettersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $letters = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];

        foreach ($letters as $index => $letter) {
            DniLetter::factory()->create([
                'index' => $index,
                'letter' => $letter,
            ]);
        }
    }
}
