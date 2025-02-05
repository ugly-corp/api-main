<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostListRequest;
use App\Http\Resources\Admin\PostCollection;
use App\Http\Resources\Admin\PostResource;
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
        $posts = Post::with(['categories', 'user'])->withFilter($request)->paginate($limit, ['*'], 'page', $offset);
        return new PostCollection($posts);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }
}
