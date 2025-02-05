<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserListRequest;
use App\Http\Resources\Admin\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserListRequest $request): UserCollection
    {
        $users = User::with('posts')->get();
        return new UserCollection($users);
//        $limit = $request->limit;
//        $offset = $request->offset;
//        $posts = Post::with(['categories', 'user'])->paginate($limit, ['*'], 'page', $offset);
//        return new UserCollection($posts);
    }
}
