<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\V1\PostCategoryRepository;
use App\Http\Resources\V1\PostCategoryResource;
use App\Http\Resources\V1\PostCategoryCollection;
use Illuminate\Http\Request;
use App\Models\PostCategory;

class AdminPostCategoryController extends Controller
{

    protected $postCategoryRepository;

    /**
     * Class constructor.
     */
    public function __construct(PostCategoryRepository $postCategoryRepository)
    {
        $this->postCategoryRepository = $postCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postCategories = $this->postCategoryRepository->getAllPostCategories();
        return new PostCategoryCollection($postCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $postCategory = $this->postCategoryRepository->insertPostCategoryRow($data);
        return new PostCategoryResource($postCategory);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postCategory = $this->postCategoryRepository->getPostCategoryById($id);
        if(!is_object($postCategory))
        {
            return "Invalid ID";
        }
        return new PostCategoryResource($postCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCategory $postCategory, Request $request)
    {
        $data = $request->all();
        $this->postCategoryRepository->updatePostCategoryRow($postCategory, $data);
        return new PostCategoryResource($postCategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postCategory = $this->postCategoryRepository->getPostCategoryById($id);
        if(!is_object($postCategory))
        {
            return "Invalid ID";
        }
        $result = $this->postCategoryRepository->deletePostCategoryRow($postCategory);
        return response()->json([
            "message" => $result
        ]);
    }
}
