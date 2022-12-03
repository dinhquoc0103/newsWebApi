<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostCategory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'thumb', 'description', 'content', 'active', 'post_category_id', 'slug'
    ];

    public function post_categories()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id', 'id');
    }
}
