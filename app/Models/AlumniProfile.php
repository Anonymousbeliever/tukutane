<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AlumniProfile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id', // <--- ENSURE THIS LINE IS PRESENT
        'phone_number',
        'bio',
        'profile_photo_path',
        'linkedin_url',
        'github_url',
        'current_company',
        'job_title',
    ];

    /**
     * Get the user that owns the alumni profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the full URL for the profile photo.
     * 
     * @return string|null
     */
    public function getProfilePhotoUrlAttribute()
    {
        return $this->profile_photo_path ? Storage::url($this->profile_photo_path) : null;
    }

    /**
     * Check if the profile has a photo.
     * 
     * @return bool
     */
    public function hasProfilePhoto()
    {
        return !empty($this->profile_photo_path);
    }
}
