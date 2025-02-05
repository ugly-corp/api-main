<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostListRequest;
use App\Http\Resources\Admin\PostCollection;
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
}
