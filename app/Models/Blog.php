<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'title',
    'sub_title',
    'description',
    'thumbnail',
    'blog_date'
];
    public function blogImage(){
        return $this->hasMany(BlogImage::class);
    }
     public function images()
    {
        return $this->hasMany(BlogImage::class, 'blog_id', 'id');
    }
    public function comments()
{
    return $this->hasMany(Comment::class)->where('status', 'approved');
}

}

