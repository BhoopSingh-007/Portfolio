<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'category','f_category', 'images', 'project_date', 'client', 'created_at', 'url', 'detailed_description'
    ];

    public function images()
    {
        // Assuming 'images' is a JSON column storing multiple image paths
        return json_decode($this->images, true);
    }
}
