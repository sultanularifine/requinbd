<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function interns()
    {
        return $this->hasMany(Intern::class);
    }

    public function executiveMembers()
    {
        return $this->hasMany(ExecutiveMember::class); // Assuming Executive model
    }
}
