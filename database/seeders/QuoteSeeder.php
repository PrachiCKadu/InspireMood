<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // ✅ Add this line

class QuoteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('quotes')->insert([
            ['category' => 'happy', 'quote' => 'Happiness is a choice. Choose it daily.'],
            ['category' => 'sad', 'quote' => 'Tough times don’t last. Tough people do.'],
            ['category' => 'angry', 'quote' => 'Breathe in calm, breathe out stress.'],
            ['category' => 'excited', 'quote' => 'Great things are coming your way!'],
            ['category' => 'neutral', 'quote' => 'Every day is a fresh start.']
        ]);
    }
}
