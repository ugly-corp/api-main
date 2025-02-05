<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mobile\PostListRequest;
use App\Http\Requests\Mobile\StorePostRequest;
use App\Http\Requests\Mobile\UpdatePostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PostListRequest $request): PostCollection
    {
        $limit = $request->limit;
        $offset = $request->offset;
        $posts = Post::with(['categories', 'user'])->paginate($limit, ['*'], 'page', $offset);
        return new PostCollection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
//        dd($post);
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
