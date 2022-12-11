<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Http\Request;
use Spatie\Valuestore\Valuestore;

class SiteSettingsController extends Controller
{
    public function index()
    {
        $settings = [
            'enable_user_registration' => settings()->get('enable_user_registration', false),
            'show_home_page' => settings()->get('show_home_page', false),
        ];

        return view('admin.site-settings.index', [
            'settings' => $settings
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'enable_user_registration' => ['required', 'boolean'],
            'show_home_page' => ['required', 'boolean'],
        ]);

        settings()->put([
            'enable_user_registration' => $validated['enable_user_registration'],
            'show_home_page' => $validated['show_home_page'],
        ]);

        session()->flash('status', 'Settings updated!');
        return redirect()->route('admin.site-settings.index');
    }
}
