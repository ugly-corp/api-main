<?php

namespace App\Http\Controllers;

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
}
