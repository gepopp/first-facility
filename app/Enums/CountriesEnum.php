<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Str;

enum CountriesEnum : string implements HasLabel
{
    case Austria        = 'de';
    case Bulgaria       = 'bg';
    case Check_Republic = 'cz';
    case Hungaria       = 'hu';
    case Macedonia      = 'mk';
    case Romania        = 'ro';
    case Slovakia       = 'sk';
    case Slovenia       = 'sl';
    case Serbia         = 'sr';


    public function getLabel(): string
    {
        return Str::replace( '_', ' ', $this->name );
    }
}
