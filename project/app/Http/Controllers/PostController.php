<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostCategory;
use Carbon\Carbon;

class PostController extends Controller
{
    public function postIndex(){
        $categories = PostCategory::all();
        $posts = Post::orderBy('created_at', 'desc')->paginate(9);
        
        return view('frontend.post-index', compact('posts','categories'));
    }

    public function postDetail($id){
        $post = Post::find($id);
        return view('frontend.post-detail', compact('post'));
    }
}
