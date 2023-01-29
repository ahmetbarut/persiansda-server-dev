<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Hymn extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'singer_id',
        'hymn_category_id',
        'name',
        'slug',
        'thumbnail',
        'mp3',
        'body',
        'status',
        'order',
    ];

    protected $translatable = ['name', 'slug', 'body'];

    public function singer(): BelongsTo
    {
        return $this->belongsTo(Singer::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(HymnCategory::class, 'hymn_category_id', 'id');
    }
}
