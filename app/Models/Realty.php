<?php

namespace App\Models;

use App\Enums\CountriesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use LaravelLang\Publisher\Concerns\Has;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Realty extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;


    public array $translatable = [ 'name', 'description' ];


    protected $casts = [
        'country'   => CountriesEnum::class,
        'countries' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo( RealtyCategory::class );
    }

    public function metas(): HasMany
    {
        return $this->hasMany( RealtyMeta::class );
    }
}
