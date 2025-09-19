<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'duration',
        'stipend',
        'mode',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function interns()
    {
        return $this->hasMany(Intern::class);
    }
}
