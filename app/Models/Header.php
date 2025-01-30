<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'address',
        'phone',
        'working_hours',
        'icons',
        'icon_urls'
    ];

    protected $casts = [
        'icons' => 'array',
        'icon_urls' => 'array'
    ];
}
