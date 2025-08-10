<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
