<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class BlogArticle extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    public array $translatable = [ 'title', 'excerpt', 'content' ];

    protected $casts = [
        'countries'  => 'array',
        'publish_at' => 'datetime',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany( BlogArticleCategory::class );
    }
}
