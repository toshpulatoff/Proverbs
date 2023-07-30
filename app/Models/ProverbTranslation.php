<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProverbTranslation extends Model
{
    use HasFactory;
    //use Sluggable;

    protected $fillable = ['slug', 'proverb_id', 'content'];

    // public function sluggable()
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'content'
    //         ]
    //     ];
    // }

    public function proverbs()
    {
        return $this->belongsTo(Proverb::class);
    }
}
