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


    public function getLong()
    {
        return match ( $this ) {
            CountriesEnum::Austria => 'ATU',
            CountriesEnum::Bulgaria => 'BGR',
            CountriesEnum::Check_Republic => 'CZE',
            CountriesEnum::Hungaria => 'HUN',
            CountriesEnum::Macedonia => 'MKD',
            CountriesEnum::Romania => 'ROU',
            CountriesEnum::Slovenia => 'SLO',
            CountriesEnum::Slovakia => 'SVK',
            CountriesEnum::Serbia => 'SRB'
        };
    }


    public static function toAssociativeArray(): array
    {
        foreach ( self::cases() as $case ) {
            $array[ $case->value ] = $case->name;
        }

        return $array;
    }
}
