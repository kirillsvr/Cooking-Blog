<?php

namespace App\Actions;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingUpdateAction
{
    public function execute(array $data): void
    {
        $this->update($data);
        $this->clearCache();
    }

    private function update(array $data)
    {
        foreach ($data as $key => $value){
            Setting::where('key', $key)->update(['value' => $value]);
        }
    }

    private function clearCache(): void
    {
        Cache::forget('settings');
    }
}
