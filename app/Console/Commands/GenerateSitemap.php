<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Sitemap;
use Carbon\Carbon;
use Spatie\Sitemap\Tags\Url;
use App\Models\Proverb;
use App\Models\Category;
use App\Models\Tag;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Automatically Generate an XML Sitemap';

    public function handle()
    {
        SitemapGenerator::create(config('app.url'))
            ->writeToFile(public_path('sitemap.xml'));
            
        $this->info('Sitemap generated successfully.');
    }
}
