<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class FrontpageSettings extends Settings
{

    public static function group(): string
    {
        return 'frontpage';
    }
}