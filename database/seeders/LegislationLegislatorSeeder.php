<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LegislationLegislatorSeeder extends Seeder
{
    public function run(): void
    {
        // Link multiple legislators to multiple legislations
        DB::table('legislation_legislator')->insert([
            [ 'legislation_id' => 1, 'legislator_id' => 1, 'created_at' => now(), 'updated_at' => now() ], // Alice - Clean Water Act
            [ 'legislation_id' => 1, 'legislator_id' => 3, 'created_at' => now(), 'updated_at' => now() ], // Carol - Clean Water Act
            [ 'legislation_id' => 2, 'legislator_id' => 2, 'created_at' => now(), 'updated_at' => now() ], // Bob - Education Reform Bill
            [ 'legislation_id' => 2, 'legislator_id' => 4, 'created_at' => now(), 'updated_at' => now() ], // David - Education Reform Bill
            [ 'legislation_id' => 3, 'legislator_id' => 5, 'created_at' => now(), 'updated_at' => now() ], // Eva - Healthcare Access Law
            [ 'legislation_id' => 3, 'legislator_id' => 1, 'created_at' => now(), 'updated_at' => now() ], // Alice - Healthcare Access Law
            [ 'legislation_id' => 4, 'legislator_id' => 2, 'created_at' => now(), 'updated_at' => now() ], // Bob - Renewable Energy Initiative
            [ 'legislation_id' => 4, 'legislator_id' => 3, 'created_at' => now(), 'updated_at' => now() ], // Carol - Renewable Energy Initiative
            [ 'legislation_id' => 5, 'legislator_id' => 4, 'created_at' => now(), 'updated_at' => now() ], // David - Public Safety Enhancement
            [ 'legislation_id' => 5, 'legislator_id' => 5, 'created_at' => now(), 'updated_at' => now() ], // Eva - Public Safety Enhancement
        ]);
    }
}
