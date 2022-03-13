<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
    public function store(Request $request){

        // $tags = [];
        // $categories = [];

        // $tags = array_unique(array_merge($tags, $request->tags));
        // $categories = array_unique(array_merge($categories, $request->categories));
        // dd($tags);
        $this->validate($request,[
            'title'         => 'required|max:150',
            'slug'          => 'required|unique:posts,slug|max:65',
            'tags'          => 'required|array',
            'categories'    => 'required|array',
            'image'         => 'required'
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/post/'.$img);
            Image::make($image)->save($location);
        }

        $post               = new Post();
        $post->user_id      = Auth::id();
        $post->title        = $request->title;
        $post->slug         = Str::slug($request->title);
        $post->image        = $img;
        $post->body         = $request->body;
        // $post->categories   = $categories;
        // $post->tags         = $tags;

        if(isset($request->status)){
            $post->status = true;
        }else{
            $post->status = false;
        }
        $post->is_approved = true;
        $post->save();

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);


        return redirect()->route('user.posts')->with(['msg' => 'Post Created Successfully']);
    }
    public function edit($id){
        $categories = Category::orderBy('id','desc')->get();
        $tags      = Tag::orderBy('id','desc')->get();
        $post     = Post::find($id);
        return view('backend.pages.post.edit',compact('categories','tags','post'));
    }
    public function update(Request $request , $id){



        $this->validate($request,[
            'title'         => 'required|max:150',
            'slug'          => 'required|unique:tags,slug,'.\Request()->id,
            'tags'          => 'required|array',
            'categories'    => 'required|array',

        ]);
        $post               = Post::find($id);
        $post->user_id      = Auth::id();
        $post->title        = $request->title;
        $post->slug         = Str::slug($request->title);
        $post->body         = $request->body;


        if(isset($request->status)){
            $post->status = true;
        }else{
            $post->status = false;
        }
        $post->is_approved = true;

        if($request->hasFile('image')){
            $imgDelete = 'images/post/'.$post->image;
            if(File::exists($imgDelete)){
                File::delete($imgDelete);
            }
            $image = $request->file('image');
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/post/'.$img);
            Image::make($image)->save($location);
            $post->image = $img;
        }
        $post->save();

        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        return redirect()->route('user.posts')->with(['msg' => 'Post Updated Successfully']);
    }
    public function delete($id){
        Post::find($id)->delete();
        return redirect()->back()->with('msg','Post Deleted Successfully');
    }

}
