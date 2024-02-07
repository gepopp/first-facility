<?php

namespace App\Filament\Resources\BlogArticleCategoryResource\Pages;

use App\Filament\Resources\BlogArticleCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Tables\Actions\LocaleSwitcher;

class EditBlogArticleCategory extends EditRecord
{
    use EditRecord\Concerns\Translatable;


    protected static string $resource = BlogArticleCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
