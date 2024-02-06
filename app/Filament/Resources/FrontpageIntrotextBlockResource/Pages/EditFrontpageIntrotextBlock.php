<?php

namespace App\Filament\Resources\FrontpageIntrotextBlockResource\Pages;

use App\Filament\Resources\FrontpageIntrotextBlockResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFrontpageIntrotextBlock extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = FrontpageIntrotextBlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make()
        ];
    }
}
