<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mobile\UserFavouritePostListRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAuthors(): UserCollection
    {
        $users = User::whereHas('posts')->get();
        return new UserCollection($users);
    }

    public function getFavouritePosts(UserFavouritePostListRequest $request): PostCollection
    {
        $limit = $request->limit ?? 10;
        $offset = $request->offset ?? 0;
        $user = User::find($request->user()->id);
        return new PostCollection($user->likedPosts()->paginate($limit, ['*'], 'page', $offset));
    }
}
