<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;

   protected $fillable = [
        'name',
        'email',
        'phone',
        'designation',
        'dob',
        'joining_date',
        'ending_date',
        'photo',
        'cv',
        'certificate_no',
        'whatsapp_no',
        'facebook_link',
        'linkedin_link',
        'institution',
        'present_address',
        'department_id',
    ];

    protected $dates = [
        'dob',
        'joining_date',
        'ending_date',
    ];

    // Relationship with Department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }


    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

   protected static function boot()
{
    parent::boot();

    static::creating(function ($intern) {
        $prefix = 'R'; // Requin BD

        // Get first letter of every word in department name
        $departmentName = $intern->department->name ?? 'X';
        $words = preg_split('/\s+/', $departmentName);
        $deptCode = '';
        foreach ($words as $word) {
            if (ctype_alpha($word[0])) { // only letters
                $deptCode .= strtoupper($word[0]);
            }
        }

        $batch = 'B'; // Batch
        $internMark = 'I'; // Intern
        $certificate = 'C'; // Certificate

        // Count previous interns in the same department
        $count = Intern::where('department_id', $intern->department_id)->count() + 1;

        // Generate certificate number
        $intern->certificate_no = $prefix . $deptCode . $internMark . $batch . $certificate . $count;
    });
}

}
