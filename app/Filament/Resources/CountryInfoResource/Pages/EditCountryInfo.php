<?php

namespace App\Filament\Resources\CountryInfoResource\Pages;

use App\Filament\Resources\CountryInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCountryInfo extends EditRecord
{
    use EditRecord\Concerns\Translatable;


    protected static string $resource = CountryInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
