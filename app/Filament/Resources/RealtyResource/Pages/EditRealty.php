<?php

namespace App\Filament\Resources\RealtyResource\Pages;

use App\Filament\Resources\RealtyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRealty extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = RealtyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
