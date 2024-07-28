<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAuthors(): \Illuminate\Database\Eloquent\Collection|array
    {
        return User::whereHas('posts')->get();
    }
}
