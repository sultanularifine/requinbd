<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

   protected $fillable = ['name', 'email', 'password', 'role', 'image'];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Role check helpers
    public function isAdminOrExecutive() {
        return $this->role === 'admin' || $this->role === 'executive';
    }

    public function isIntern() {
        return $this->role === 'intern';
    }

    // Relationships
    public function internProfile() {
        return $this->hasOne(Intern::class);
    }

    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function ratings() {
        return $this->hasManyThrough(Rating::class, Intern::class, 'user_id', 'intern_id', 'id', 'id');
    }
}
