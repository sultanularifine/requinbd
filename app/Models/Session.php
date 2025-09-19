<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = [
    'title',
    'description',
    'icon',
    'date',
    'mode',
    'platform', // <- make sure this is included
];
    protected $casts = [
    'date' => 'date', // now $session->date will be a Carbon instance
];
}
