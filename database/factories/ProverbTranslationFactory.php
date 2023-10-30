<?php

namespace Database\Factories;

use App\Models\Proverb;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProverbTranslation>
 */
class ProverbTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $translations = [];

        // foreach (config('translatable.locales') as $locale) {
        //     $content[$locale] = fake()->sentence(rand(3, 6));

        //     return [
        //         'content' => $content,
        //         'locale' => $locale,
        //     ];
        // }

        // $proverbs = Proverb::all();

        // foreach ($proverbs as $proverb) {
        //     $proverbId = $proverb->id;
        // }

        // return [
        //     'proverb_id' => $proverbId,
        //     'content' => [
        //         'oz' => fake()->sentence,
        //         'uz' => fake()->sentence,
        //         'en' => fake()->sentence,
        //         'ru' => fake()->sentence,
        //     ],
        // ];

        // $locales = config('translatable.locales');

        // $proverbId = Proverb::inRandomOrder()->first()->id;

        // $translations = [];

        // foreach ($locales as $locale) {
        //     $translations[] = [
        //         'proverb_id' => $proverbId,
        //         'content' => fake()->words(5, true),
        //         'locale' => $locale,
        //     ];
        // }

        // return $translations;

        //     'content' => implode(",", $content),

        $locales = config('translatable.locales');
    
        $proverbId = Proverb::inRandomOrder()->first()->id;
    
        $translations1 = [];
    
        foreach ($locales as $locale) {
            $translation[] = [
                'proverb_id' => $proverbId,
                'content' => fake()->sentence,
                'locale' => $locale,
            ];

            $translations1[] = $translation;
        }
    
        //$translations = implode(",", $translations1);

        return $translations1;
    }
}
