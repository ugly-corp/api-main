<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mobile\PostListRequest;
use App\Http\Requests\Mobile\StorePostRequest;
use App\Http\Requests\Mobile\UserPostLikeRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


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

    public function like(Post $post, UserPostLikeRequest $request)
    {
        $user = User::find($request->user()->id);
        if ($request->is_liked) {
            $isAlreadyLiked = $user->likedPosts->first(function ($item) use ($post) {
                return $item->id === $post->id;
            });
            if (!$isAlreadyLiked) {
                $user->likedPosts()->save($post);
            }
        } else {
            $user->likedPosts()->detach($post);
        }
        return ['success' => true];
    }
}
