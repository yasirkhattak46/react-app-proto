<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeMultiSec extends Model
{
    use HasFactory;

    protected $fillable = [
        'color_content',
        'apps_title',
        'apps_icon',
        'faq_title',
        'faqs',
        'content',
    ];
}
