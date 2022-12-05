<?php

namespace App\Http\Repositories\V1;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\PostCategory;

class PostCategoryRepository
{
    // Get all postCategory row from database
    public function getAllPostCategories()
    {
        return PostCategory::paginate(6);
    }

    // Insert postCategory row to database
    public function insertPostCategoryRow($data)
    {
        return PostCategory::create($data);
    }

    // Update postCategory row to database
    public function getPostCategoryById($id)
    {
        return PostCategory::find($id);
    }

    // Update postCategory row to database
    public function updatePostCategoryRow($postCategory, $data)
    {
        $postCategory->fill($data);
    }

    // Delete postCategory row from database
    public function deletePostCategoryRow($post)
    {
        return $post->delete();
    }

    // Delete postCategory row from database
    public function getListPostByKeyword($keyword)
    {
        return Post::where("title", $keyword)->get();
    }
}


?>