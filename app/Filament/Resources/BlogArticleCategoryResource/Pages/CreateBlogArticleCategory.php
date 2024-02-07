<?php

namespace App\Filament\Resources\BlogArticleCategoryResource\Pages;

use App\Filament\Resources\BlogArticleCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogArticleCategory extends CreateRecord
{
    protected static string $resource = BlogArticleCategoryResource::class;
}
