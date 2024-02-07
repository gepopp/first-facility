<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum BlogArticleStatusEnum: string implements HasLabel
{
    case DRAFT = 'Draft';
    case PUBLISHED = 'Publish';


    public function getLabel(): ?string
    {
        return $this->name;
    }
}
