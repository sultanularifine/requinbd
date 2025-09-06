<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    
    protected $fillable = ['intern_id', 'month', 'score'];

    public function intern()
    {
        return $this->belongsTo(Intern::class);
    }
}
