<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
     * Display the user's settings page.
     */
    public function index(): View
    {
        $user = Auth::user();
        return view('settings.index', compact('user'));
    }

    /**
     * Handle settings updates.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'theme_preference' => 'required|in:light,dark,auto',
            'notification_preference' => 'required|in:all,important,none',
            'language_preference' => 'required|in:en,sw',
            'email_notifications' => 'boolean',
            'push_notifications' => 'boolean',
        ]);

        $user = Auth::user();
        $user->update([
            'theme_preference' => $request->theme_preference,
            'notification_preference' => $request->notification_preference,
            'language_preference' => $request->language_preference,
            'email_notifications' => $request->boolean('email_notifications'),
            'push_notifications' => $request->boolean('push_notifications'),
        ]);

        return back()->with('success', 'Settings updated successfully!');
    }
}
