<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExecutiveMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'designation', 'joining_date', 'photo', 'department_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
