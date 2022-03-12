<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class TagController extends Controller
{

    public function index(){
        $tags = Tag::paginate(3);
        return view('backend.pages.tag.index',compact('tags'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required|max:65',
            'slug'  => 'required|unique:tags,slug'
        ]);
        $tag                = new Tag();
        $tag->title         = $request->title;
        $tag->slug          = Str::slug($request->title);
        $tag->description   = $request->description;
        $tag->save();
        return redirect()->back()->with(['msg' => 'Tag Created Successfully.']);
     }
     public function edit($id){
         $tag = Tag::find($id);
         return view('backend.pages.tag.edit',compact('tag'));
     }
     public function update(Request $request ,$id){
        $this->validate($request,[
            'title' => 'required|max:65',
            'slug'  => 'required|unique:tags,slug,'.\Request()->id
        ]);

        $tag                = Tag::find($id);
        $tag->title         = $request->title;
        $tag->slug          = Str::slug($request->title);
        $tag->description   = $request->description;
        $tag->save();
        return redirect()->route('user.tags')->with(['msg' => 'Tag Updated Successfully.']);
     }
     public function delete($id){
         Tag::find($id)->delete();
         return redirect()->back()->with(['msg' => 'Tag Deleted Successfully']);
     }
}
