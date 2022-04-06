<?php

namespace App\Services;

class GetSettingService
{
    public static function recipePaginate(): int
    {
        if (config('settingsAdmin.recipe_on_page')){
            return config('settingsAdmin.recipe_on_page');
        }

        return config('settingsFront.recipe_on_page');
    }
}
