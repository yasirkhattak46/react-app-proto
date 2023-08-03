<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'primary_color',
        'secondary_color',
        'header_script',
        'footer_script',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
