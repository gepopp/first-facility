<?php

namespace App\Filament\Resources\FrontpageIntrotextBlockResource\Pages;

use App\Filament\Resources\FrontpageIntrotextBlockResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFrontpageIntrotextBlocks extends ListRecords
{
    protected static string $resource = FrontpageIntrotextBlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
