<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'title', 'meta_title', 'meta_description', 'meta_keywords', 'canonical_url'];

    public function proverbs()
    {
        return $this->belongsToMany(Proverb::class);
    }
}
