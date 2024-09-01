<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mobile\StorePostRequest;
use App\Http\Requests\Mobile\UpdatePostRequest;
use App\Http\Resources\PostCollection;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['categories', 'user'])->get();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
