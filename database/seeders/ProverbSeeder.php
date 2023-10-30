<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proverb;
use App\Models\ProverbTranslation;
use App\Models\Category;
use App\Models\Tag;
use app\Models\User;
use Illuminate\Support\Str;

class ProverbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = config('translatable.locales'); 

        Proverb::factory(10)
            ->has(Category::factory(1))
            ->has(Tag::factory(rand(2, 3)))
            ->create()
            ->each(function ($proverb) use ($locales) {
                foreach ($locales as $locale) {
                    $content = fake()->sentence(rand(3, 6));

                    ProverbTranslation::create([
                        'proverb_id' => $proverb->id,
                        'content' => $content,
                        'locale' => $locale,
                    ]);
                    
                    if ($locale === 'oz') {
                        $slug = Str::slug($content);
                        $proverb->update(['slug' => $slug]);
                    }
                }
            });
    }
}
