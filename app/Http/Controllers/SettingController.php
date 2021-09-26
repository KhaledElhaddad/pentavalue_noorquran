<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index (Request $request) {
        
        $platform = $request->platform;
        $version = $request->version;


        $current = Setting::where('platform', $platform)
            ->where('current_version', $version)
            ->latest('created_at', 'desc')
            ->first();

        return $current;
    }
}
