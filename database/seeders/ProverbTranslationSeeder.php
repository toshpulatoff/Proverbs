<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proverb;
use App\Models\ProverbTranslation;

class ProverbTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProverbTranslation::factory(Proverb::count())->create();
    }
}
