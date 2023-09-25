<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProverbTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['proverb_id', 'content'];

    public function proverbs()
    {
        return $this->belongsTo(Proverb::class);
    }
}
