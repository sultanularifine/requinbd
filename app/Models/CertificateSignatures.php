<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateSignatures extends Model
{
  use HasFactory;

   protected $fillable = [
        'department_id',
        'name1',
        'designation1',
        'signature1',
        'name2',
        'designation2',
        'signature2'
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
