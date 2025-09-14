<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function blogImage(){
        return $this->hasMany(BlogImage::class);
    }
     public function images()
    {
        return $this->hasMany(BlogImage::class, 'blog_id', 'id');
    }
}
