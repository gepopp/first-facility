<?php

namespace App\Filament\Resources\HeroSlideResource\Pages;

use App\Filament\Resources\HeroSlideResource;
use Filament\Actions;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Pages\EditRecord;

class EditHeroSlide extends EditRecord
{
    use \Filament\Resources\Pages\EditRecord\Concerns\Translatable;

    protected static string $resource = HeroSlideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make()
        ];
    }
}
