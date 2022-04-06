<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Settings\SettingUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSetting;
use App\Models\Setting;
use App\Models\SettingAdmin;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $this->authorize('edit', Setting::class);
        $settingsFront = Setting::all();
        $settingsAdmin = SettingAdmin::all();
        return view('admin.settings.edit', compact('settingsFront', 'settingsAdmin'));
    }

    public function update(Request $request, SettingUpdateAction $action)
    {
        $this->authorize('update', Setting::class);
        $action->execute($request->all());
        return response()->json('Настройки успешно изменены', 200);
    }
}
