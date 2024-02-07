<?php

namespace App\Filament\Resources\RealtyMetaResource\Pages;

use App\Filament\Resources\RealtyMetaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRealtyMeta extends EditRecord
{

    use EditRecord\Concerns\Translatable;

    protected static string $resource = RealtyMetaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
