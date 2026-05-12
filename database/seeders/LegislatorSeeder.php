<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LegislatorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('legislators')->insert([
            [
                'first_name' => 'Alice',
                'last_name' => 'Smith',
                'hometown' => 'Springfield',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Bob',
                'last_name' => 'Johnson',
                'hometown' => 'Riverside',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Carol',
                'last_name' => 'Williams',
                'hometown' => 'Lakeside',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'David',
                'last_name' => 'Brown',
                'hometown' => 'Hilltown',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Eva',
                'last_name' => 'Davis',
                'hometown' => 'Brookfield',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
