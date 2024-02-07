<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class CountryInfo extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['info'];


    public function country(): BelongsTo
    {
        return $this->belongsTo( Country::class );
    }
}
