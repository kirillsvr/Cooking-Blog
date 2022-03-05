<?php

namespace App\Actions;

use App\Models\Setting;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class GetSettingsAction
{
    public static function execute(): void
    {
        if (!Cache::has('settings')) {
            foreach (Setting::all() as $setting) {
                Config::set('settings.' . $setting->key, $setting->value);
            }

            Cache::remember('settings', 24*60, function() {
                return Arr::pluck(Setting::all()->toArray(), 'value', 'key');
            });
            return;
        }

        foreach (Cache::get('settings') as $key => $setting){
            Config::set('settings.' . $key, $setting);
        }
    }
}
