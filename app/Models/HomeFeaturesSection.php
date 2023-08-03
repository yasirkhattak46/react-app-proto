<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeFeaturesSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_content',
        'icons_title',
        'icons',
    ];
}
