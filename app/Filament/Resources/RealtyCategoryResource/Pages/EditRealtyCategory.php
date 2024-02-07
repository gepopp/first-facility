<?php

namespace App\Filament\Resources\RealtyCategoryResource\Pages;

use App\Filament\Resources\RealtyCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRealtyCategory extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = RealtyCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
