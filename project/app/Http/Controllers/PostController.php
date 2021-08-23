<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    public function postIndex(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('frontend.post-index', compact('posts'));
    }

    public function postDetail($id){
        $post = Post::find($id);
        return view('frontend.post-detail', compact('post'));
    }
}
