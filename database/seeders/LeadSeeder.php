<?php

namespace Database\Seeders;

use App\Models\Lead;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lead::create([
            "created_by" => 1,
            "updated_by" => 1,
            "deleted_by" => null,
            "created_at" => now(),
            "updated_at" => now(),
            "deleted_at" => null,
        ]);
    }
}
