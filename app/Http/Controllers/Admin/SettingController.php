<?php

namespace App\Http\Controllers\Admin;

use App\Actions\SettingUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSetting;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $this->authorize('edit', Setting::class);
        $settings = Setting::all();
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(StoreSetting $request, SettingUpdateAction $action)
    {
        $this->authorize('update', Setting::class);
        $action->execute($request->validated());
        return redirect()->route('settings.edit');
    }
}
