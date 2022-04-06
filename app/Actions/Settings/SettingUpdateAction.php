<?php

namespace App\Actions\Settings;

use App\Models\Setting;
use App\Models\SettingAdmin;
use Illuminate\Support\Facades\Cache;

class SettingUpdateAction
{
    public function execute(array $data): void
    {
        $this->updateFront($data['front']);
        $this->updateAdmin($data['admin']);
        $this->clearCache();
    }

    private function updateFront(array $data)
    {
        foreach ($data as $key => $value){
            Setting::where('key', $key)->update(['value' => $value]);
        }
    }

    private function updateAdmin(array $data)
    {
        foreach ($data as $key => $value){
            SettingAdmin::where('key', $key)->update(['value' => $value]);
        }
    }

    private function clearCache(): void
    {
        Cache::forget('settingsFront');
        Cache::forget('settingsAdmin');
    }
}
