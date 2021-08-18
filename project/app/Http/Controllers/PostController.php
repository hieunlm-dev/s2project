<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    public function postIndex(){
        $posts = Post::all();
        return view('frontend.post-index', compact('posts'));
    }
}
