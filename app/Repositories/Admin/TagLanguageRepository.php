<?php

namespace App\Repositories\Admin;

use App\Models\TagLanguage;
use App\Repositories\Interface\TagLanguageInterface;

class TagLanguageRepository implements TagLanguageInterface
{
  public function get($id){
      return TagLanguage::find($id);
  }
  public function getByLang($id, $request)
  {
      return TagLanguage::where('tag_id',$id)->where('lang',$request->lang);
  }
  public function  all(){
      return TagLanguage::latest();
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
