<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'description',
        'contact_items',
        'icons',
        'tags',
        'instagram_photos',
        'copyright_text'
    ];

    protected $casts = [
        'contact_items' => 'array',
        'icons' => 'array',
        'tags' => 'array',
        'instagram_photos' => 'array'
    ];
}
