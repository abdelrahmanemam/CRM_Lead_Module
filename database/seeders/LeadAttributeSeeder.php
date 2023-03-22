<?php

namespace Database\Seeders;

use App\Models\LeadAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeadAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LeadAttribute::create([
            'lead_id' => 1,
            'attribute_id' => 1,
            'value' => "ahmed",
        ]);

        LeadAttribute::create([
            'lead_id' => 1,
            'attribute_id' => 2,
            'value' => "mohamed",
        ]);

        LeadAttribute::create([
            'lead_id' => 1,
            'attribute_id' => 3,
            'value' => "ahmed mohamed",
        ]);

        LeadAttribute::create([
            'lead_id' => 1,
            'attribute_id' => 4,
            'value' => "this is a description",
        ]);

        LeadAttribute::create([
            'lead_id' => 1,
            'attribute_id' => 5,
            'value' => "new address",
        ]);

        LeadAttribute::create([
            'lead_id' => 1,
            'attribute_id' => 6,
            'value' => "male",
        ]);
    }
}
