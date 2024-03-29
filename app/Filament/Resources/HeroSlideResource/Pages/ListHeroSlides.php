<?php

namespace App\Filament\Resources\HeroSlideResource\Pages;

use App\Filament\Resources\HeroSlideResource;
use Filament\Actions;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Pages\ListRecords;

class ListHeroSlides extends ListRecords
{
    use \Filament\Resources\Pages\ManageRecords\Concerns\Translatable;


    protected static string $resource = HeroSlideResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
