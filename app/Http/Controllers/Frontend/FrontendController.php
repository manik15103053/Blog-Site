<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;

class FrontendController extends Controller
{
    public function index(){
        $posts = Post::paginate(10);
        $categories = Category::all();
        $tags = Tag::latest()->get();
        return view('frontend.app',compact('posts','categories','tags'));
    }
}
