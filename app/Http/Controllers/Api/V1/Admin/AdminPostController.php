<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\V1\PostRepository;
use App\Http\Resources\V1\PostResource;
use App\Http\Resources\V1\PostCollection;
use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    protected $postRepository;

    /**
     * Class constructor.
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepository->getAllPosts();
        return new PostCollection($posts);
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
        $post = $this->postRepository->insertPostRow($data);
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $post = $this->postRepository->getPostById($id);
        if(!is_object($post))
        {
            return "Invalid ID";
        }
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, Request $request)
    {
        $data = $request->all();
        $this->postRepository->updatePostRow($post, $data);
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->postRepository->getPostById($id);
        if(!is_object($post))
        {
            return "Invalid ID";
        }
        $result = $this->postRepository->deletePostRow($post);
        return response()->json([
            "message" => $result
        ]);
    }
}
