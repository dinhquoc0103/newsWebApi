<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostCategory;

class PostCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'thumb', 'description', 'active', 'level', 'parent_id', 'slug'
    ];

    public function posts(){
        return $this->hasMany(Post::class, 'post_category_id', 'id');
    }
}
