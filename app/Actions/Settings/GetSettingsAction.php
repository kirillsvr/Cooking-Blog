<?php

namespace App\Actions\Settings;

use App\Models\Setting;
use App\Models\SettingAdmin;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class GetSettingsAction
{
    public static function front(): void
    {
        if (!Cache::has('settingsFront')) {
            foreach (Setting::all() as $setting) {
                Config::set('settingsFront.' . $setting->key, $setting->value);
            }

            Cache::remember('settingsFront', 24*60, function() {
                return Arr::pluck(Setting::all()->toArray(), 'value', 'key');
            });
            return;
        }

        foreach (Cache::get('settingsFront') as $key => $setting){
            Config::set('settingsFront.' . $key, $setting);
        }
    }

    public static function admin(): void
    {
        if (!Cache::has('settingsAdmin')) {
            foreach (SettingAdmin::all() as $setting) {
                Config::set('settingsAdmin.' . $setting->key, $setting->value);
            }

            Cache::remember('settingsAdmin', 24*60, function() {
                return Arr::pluck(SettingAdmin::all()->toArray(), 'value', 'key');
            });
            return;
        }

        foreach (Cache::get('settingsAdmin') as $key => $setting){
            Config::set('settingsAdmin.' . $key, $setting);
        }
    }
}
