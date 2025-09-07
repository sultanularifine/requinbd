<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'designation',
        'department',
        'duration_of_employment',
        'birthday_certificate',
        'birthday_original',
        'email',
        'mobile_number',
        'photo',
        'permanent_address',
        'facebook_profile',
        'linkedin_profile',
     ];
}
