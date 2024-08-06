<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    // The attributes that are mass assignable.
    protected $fillable = [
        'title',
        'description',
        'birthday',
        'experince',
        'website',
        'phone',
        'city',
        'age',
        'degree',
        'email',
        'freelance',
        'profile_image',
    ];

    // Add any other model methods or relationships here
}

