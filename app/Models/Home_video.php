<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_video extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'description',
        'video_id',
        'thumbnail',
        'content'
    ];
}
