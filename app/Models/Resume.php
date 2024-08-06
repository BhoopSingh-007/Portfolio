<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'summary',
        'address',
        'phone',
        'email',
        'education_title',
        'education_duration',
        'education_institution',
        'education_description',
        'experience_title',
        'experience_duration',
        'experience_company',
        'experience_description',
    ];
}
