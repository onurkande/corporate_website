<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status'
    ];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_tag_pivot', 'blog_tag_id', 'blog_id');
    }
} 