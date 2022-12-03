<?php

namespace App\Http\Repositories\V1;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Post;

class PostRepository
{
    // Get all post row from database
    public function getAllPosts()
    {
        return Post::paginate(6);
    }

    // Insert post row to database
    public function insertPostRow($data)
    {
        return Post::create($data);
    }

    // Update post row to database
    public function getPostById($id)
    {
        return Post::find($id);
    }

    // Update post row to database
    public function updatePostRow($post, $data)
    {
        $post->fill($data);
    }

    public function deletePostRow($post)
    {
        return $post->delete();
    }
}


?>