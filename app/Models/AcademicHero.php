<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicHero extends Model
{
    use HasFactory;
     protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_text',
        'hero_image',
    ];
}
