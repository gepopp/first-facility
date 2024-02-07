<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class BlogArticleCategory extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    public array $translatable = ['name'];

    public function blogArticles(): BelongsToMany
    {
        return $this->belongsToMany( BlogArticle::class );
    }
}
