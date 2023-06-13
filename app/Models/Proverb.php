<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Proverb extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['content', 'slug'];
    protected $fillable = ['content', 'slug', 'image_url', 'author_id', 'status'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proverb_translations()
    {
        return $this->hasMany(ProverbTranslation::class);
    }
}
