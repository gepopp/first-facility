<?php

namespace App\Filament\Resources\RealtyCategoryResource\Pages;

use App\Filament\Resources\RealtyCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRealtyCategories extends ListRecords
{
    protected static string $resource = RealtyCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
