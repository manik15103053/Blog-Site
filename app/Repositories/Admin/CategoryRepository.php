<?php

 namespace App\Repositories\Admin;

use App\Models\Category;
use App\Models\CategoryLanguage;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interface\CategoryInterface;
use App\Repositories\Interface\CategoryLanguageInterface;

 class CategoryRepository implements CategoryInterface
 {
     protected $categoryLang;

     public function __construct(CategoryLanguageInterface $categoryLang)
     {
        $this->categoryLang = $categoryLang;
     }
     public function get($id){
         return Category::find($id);
     }
     public function getByLang($id, $lang)
     {
         if($lang == null):
            $categoryByLang = CategoryLanguage::with('category')->where('lang', 'en')->where('category_id',$id)->first();
         else:
            $categoryByLang = CategoryLanguage::with('category')->where('lang', $lang)->where('category_id', $id)->first();
            if(blank($categoryByLang)):
                $categoryByLang = CategoryLanguage::with('category')->where('lang','en')->where('category_id',$id)->first();
                $categoryByLang['translation_null'] = 'not-found';
            endif;
        endif;
        return $categoryByLang;
     }
     public function all(){
         return Category::leftJoin('category_languages','category_language.category_id', '=', 'categorys.id')
                          ->select('categories.*', 'category_language.id as category_lang_id','category_language.title','category_language.lang','category_language.description');
     }
     public function paginate($limit)
     {
         return $this->all()->where('lang', 'en')->paginate($limit);
     }
     public function store($request)
     {
        DB::beginTransaction();
        try{
            $category = new Category();
            $category->slug = $this->getSlug($request->title,$request->slug);
            $category->save();

            $request['category_id'] = $category->id;
            if($request->lang == ''):
                $request['lang']  =  'en';
            endif;
            $this->categoryLang->store($request);

            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollback();
            return false;
        }
     }
     public function update($request)
     {
        DB::beginTransaction();
        try{
            $category = $this->get($request->category_id);
            $category->slug  = $this->getSlug($request->title,$request->slug);
            $category->save();

            if($request->category_lang_id == ''):
                $this->categoryLang->store($request);
            else:
                $this->categoryLang->update($request);
            endif;

            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollback();
            return false;
        }
     }
 }

