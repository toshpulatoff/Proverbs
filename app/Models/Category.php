<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Modelable;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'title', 'description', 'parent_id', 'meta_title', 'meta_description', 'meta_keywords', 'canonical_url'];

    public function proverbs()
    {
        return $this->belongsToMany(Proverb::class);
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}