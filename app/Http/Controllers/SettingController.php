<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return Setting::first();
    }

    public function update(Request $request)
    {
        $setting = Setting::first() ?? new Setting();
        $setting->update($request->all());
        return $setting;
    }
}
