<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate(3);
        return view('backend.pages.post.index',compact('posts'));
    }
    public function create(){
        $tags = Tag::orderBy('id','desc')->get();
        $categories = Category::orderBy('id','desc')->get();
        return view('backend.pages.post.create',compact('tags','categories'));
    }
}
