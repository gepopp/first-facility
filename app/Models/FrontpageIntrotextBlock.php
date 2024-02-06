<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class FrontpageIntrotextBlock extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    public $translatable = [ 'pre_heading', 'heading', 'excerpt', 'text' ];

    protected $casts = [
        'countries' => 'array',
        'heading'  => 'array',
        'excerpt'  => 'array',
        'text'     => 'array',
        'links'    => 'array',
    ];


}
