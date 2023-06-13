<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['name', 'description'];
    protected $fillable = ['slug', 'parent_id'];

    public function proverbs()
    {
        return $this->belongsToMany(Proverb::class);
    }

    public function category_translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }
}