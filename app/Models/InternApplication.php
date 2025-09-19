<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'formal_name','email','contact_no','dob','whatsapp_no',
        'facebook_profile','linkedin_profile','institution',
        'present_address','why_join','cv','photo','department_id','status','designation'
    ];
}
