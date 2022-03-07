<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        $categorie = Category::paginate(3);
        return view('backend.pages.category.index',compact('categorie'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required|max:65',
            'slug'  => 'required|unique:tags,slug'
        ]);
        $category                = new Category();
        $category->title         = $request->title;
        $category->slug          = Str::slug($request->title);
        $category->description   = $request->description;
        $category->save();
        return redirect()->back()->with(['msg' => 'Category Created Successfully.']);
     }
     public function edit($id){
         $category = Category::find($id);
         return view('backend.pages.category.edit',compact('category'));
     }
     public function update(Request $request ,$id){

        $this->validate($request,[
            'title' => 'required|max:65',
            'slug'  => 'required|unique:tags,slug,'.\Request()->id,
        ]);

        $category                = Category::find($id);
        $category->title         = $request->title;
        $category->slug          = Str::slug($request->title);
        $category->description   = $request->description;
        $category->save();
        return redirect()->route('categories')->with(['msg' => 'Category Updated Successfully.']);
     }
     public function delete($id){
         Category::find($id)->delete();
         return redirect()->back()->with(['msg' => 'Category Deleted Successfully']);
     }
}
