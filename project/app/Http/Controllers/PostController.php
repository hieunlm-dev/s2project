<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postIndex(){
        $posts = Post::all();
        return view('frontend.post-index', compact('posts'));
    }
}
