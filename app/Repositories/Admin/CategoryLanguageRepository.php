<?php

namespace App\Repositories\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use App\Models\CategoryLanguage;
use App\Repositories\Interface\CategoryLanguageInterface;

class CategoryLanguageRepository implements CategoryLanguageInterface
{
  public function get($id){
      return CategoryLanguage::find($id);
  }
  public function getByLang($id, $request)
  {
      return CategoryLanguage::where('category_id',$id)->where('lang',$request->lang);
  }
  public function  all(){
      return CategoryLanguage::latest();
  }
  public function paginate($limit)
  {
      return $this->all()->paginate($limit);
  }
  public function store($request)
  {

  }
  public function update($request)
  {
      
  }
}
