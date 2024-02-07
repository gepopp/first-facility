<?php

namespace App\Filament\Resources\BlogArticleResource\Pages;

use App\Filament\Resources\BlogArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlogArticle extends EditRecord
{
    use EditRecord\Concerns\Translatable;


    protected static string $resource = BlogArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
