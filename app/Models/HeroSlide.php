<?php

namespace App\Models;

use App\Enums\CountriesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class HeroSlide extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;


    public $translatable = ['title', 'description'];

    protected $casts = [
        'countries'   => 'array',
        'order'       => 'integer',
        'delay'       => 'integer',
    ];
}
