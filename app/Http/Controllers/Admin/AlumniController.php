<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlumniProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AlumniController extends Controller
{
    /**
     * Display a listing of the alumni.
     */
    public function index(Request $request)
    {
        $query = User::where('role', 'alumnus')->with('alumniProfile');
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhereHas('alumniProfile', function($profile) use ($search) {
                      $profile->where('current_company', 'like', "%{$search}%")
                              ->orWhere('job_title', 'like', "%{$search}%");
                  });
            });
        }
        
        $alumni = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.alumni.index', compact('alumni'));
    }

    /**
     * Show the form for editing the specified alumni profile.
     */
    public function edit(User $user)
    {
        if ($user->role !== 'alumnus') {
            abort(404);
        }
        return view('admin.alumni.edit', compact('user'));
    }

    /**
     * Update the specified alumni profile in storage.
     */
    public function update(Request $request, User $user)
    {
        if ($user->role !== 'alumnus') {
            abort(404);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'bio' => ['nullable', 'string'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'current_company' => ['nullable', 'string', 'max:255'],
            'job_title' => ['nullable', 'string', 'max:255'],
            'profile_photo' => ['nullable', 'image', 'max:2048'], // 2MB max
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $profile = $user->alumniProfile ?? new AlumniProfile(['user_id' => $user->id]);
        $profile->fill($request->only([
            'phone_number', 'bio', 'linkedin_url', 'github_url', 'current_company', 'job_title'
        ]));

        if ($request->hasFile('profile_photo')) {
            if ($profile->profile_photo_path) {
                Storage::disk('public')->delete($profile->profile_photo_path);
            }
            $profile->profile_photo_path = $request->file('profile_photo')->store('profile-photos', 'public');
        }

        $profile->save();

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni profile updated successfully.');
    }

    /**
     * Remove the specified alumni from storage.
     */
    public function destroy(User $user)
    {
        if ($user->role !== 'alumnus') {
            abort(404);
        }
        
        if ($user->alumniProfile && $user->alumniProfile->profile_photo_path) {
            Storage::disk('public')->delete($user->alumniProfile->profile_photo_path);
        }
        
        $user->delete();
        return redirect()->route('admin.alumni.index')->with('success', 'Alumni deleted successfully.');
    }
}
