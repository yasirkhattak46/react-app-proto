<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeHeroSection extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'btn_text',
        'icon_title',
        'icons',
        'description',
        'banner',
        'btn_link',
    ];
    use HasFactory;
}
