<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attribute::create([
            'name' => 'first_name',
            'option_id' => 1,
            'is_fillable' => 1,
            'is_unique' => 0,
            'is_mandatory' => 1,
            'has_value_per_locale' => 1,
        ]);

        Attribute::create([
            'name' => 'last_name',
            'option_id' => 1,
            'is_fillable' => 1,
            'is_unique' => 0,
            'is_mandatory' => 1,
            'has_value_per_locale' => 1,
        ]);

        Attribute::create([
            'name' => 'full_name',
            'option_id' => 1,
            'is_fillable' => 1,
            'is_unique' => 0,
            'is_mandatory' => 1,
            'has_value_per_locale' => 1,
        ]);

        Attribute::create([
            'name' => 'description',
            'option_id' => 2,
            'is_fillable' => 1,
            'is_unique' => 0,
            'is_mandatory' => 0,
            'has_value_per_locale' => 1,
        ]);

        Attribute::create([
            'name' => 'address',
            'option_id' => 1,
            'is_fillable' => 1,
            'is_unique' => 0,
            'is_mandatory' => 0,
            'has_value_per_locale' => 1,
        ]);

        Attribute::create([
            'name' => 'gender',
            'option_id' => 3,
            'is_fillable' => 1,
            'is_unique' => 0,
            'is_mandatory' => 0,
            'has_value_per_locale' => 1,
        ]);
    }
}
