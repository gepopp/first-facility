<?php

namespace App\Filament\Resources\BlogArticleCategoryResource\Pages;

use App\Filament\Resources\BlogArticleCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlogArticleCategories extends ListRecords
{
    protected static string $resource = BlogArticleCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
