<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'cover_image',
        'content',
        'author',
        'view_count',
        'status'
    ];

    public function tags()
    {
        return $this->belongsToMany(BlogTag::class, 'blog_tag_pivot', 'blog_id', 'blog_tag_id');
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function getApprovedComments()
    {
        return $this->comments()->where('status', true)->get();
    }

    public function incrementViewCount()
    {
        $this->increment('view_count');
    }
} 