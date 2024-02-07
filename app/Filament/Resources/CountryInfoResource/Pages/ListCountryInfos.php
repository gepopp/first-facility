<?php

namespace App\Filament\Resources\CountryInfoResource\Pages;

use App\Filament\Resources\CountryInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCountryInfos extends ListRecords
{
    protected static string $resource = CountryInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
