<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class RealtyMeta extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['name', 'value'];


    public function realty(): BelongsTo
    {
        return $this->belongsTo( Realty::class );
    }
}
