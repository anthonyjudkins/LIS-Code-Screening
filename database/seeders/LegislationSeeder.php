<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LegislationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('legislations')->insert([
            [
                'title' => 'Clean Water Act',
                'text' => 'An act to ensure clean water for all citizens.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Education Reform Bill',
                'text' => 'A bill to reform the education system.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Healthcare Access Law',
                'text' => 'Legislation to improve healthcare access in rural areas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Renewable Energy Initiative',
                'text' => 'A bill to promote renewable energy sources.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Public Safety Enhancement',
                'text' => 'An act to enhance public safety measures.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
