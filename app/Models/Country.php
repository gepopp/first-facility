<?php

namespace App\Models;

use App\Enums\CountriesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Country extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    public array $translatable = [ 'name', 'description' ];

    protected $casts = [
        'countries' => 'array',
        'country'   => CountriesEnum::class,
    ];

    public function infos(): HasMany
    {
        return $this->hasMany( CountryInfo::class );
    }
}
