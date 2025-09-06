<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    use HasFactory;
    protected $fillable = [
    'id',  // risky but works
    'hero_images',
    'hero_title',
    'hero_subtitle',
    'about_text1',
    'about_text2',
    'mission',
    'vision',
];
}
