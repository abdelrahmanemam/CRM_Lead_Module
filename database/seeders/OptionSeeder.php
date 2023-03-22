<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Option::create([
            'id' => 1,
            'type' => 'string'
        ]);

        Option::create([
            'id' => 2,
            'type' => 'text'
        ]);

        Option::create([
            'id' => 3,
            'type' => 'integer'
        ]);

        Option::create([
            'id' => 4,
            'type' => 'select'
        ]);
    }
}
