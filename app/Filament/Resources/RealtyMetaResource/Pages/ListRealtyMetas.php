<?php

namespace App\Filament\Resources\RealtyMetaResource\Pages;

use App\Filament\Resources\RealtyMetaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRealtyMetas extends ListRecords
{
    protected static string $resource = RealtyMetaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
