<?php

 namespace App\Repositories\Admin;

use App\Models\Tag;
use App\Models\TagLanguage;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interface\TagInterface;
use App\Repositories\Interface\TagLanguageInterface;


 class TagRepository implements TagInterface
 {
     protected $tagLang;

     public function __construct(TagLanguageInterface $tagLang)
     {
        $this->tagLang = $tagLang;
     }
     public function get($id){
         return Tag::find($id);
     }
     public function getByLang($id, $lang)
     {
         if($lang == null):
            $$tagByLang = TagLanguage::with('tag')->where('lang', 'en')->where('tag_id',$id)->first();
         else:
            $tagByLang = TagLanguage::with('tag')->where('lang', $lang)->where('tag_id', $id)->first();
            if(blank($tagByLang)):
                $tagByLang = TagLanguage::with('tag')->where('lang','en')->where('tag_id',$id)->first();
                $tagByLang['translation_null'] = 'not-found';
            endif;
        endif;
        return $tagByLang;
     }
     public function all(){
         return Tag::leftJoin('tag_languages','tag_languages.tag_id', '=', 'tags.id')
                          ->select('tags.*', 'tag_languages.id as tag_lang_id','tag_languages.title','tag_languages.lang','tag_languages.description');
     }
     public function paginate($limit)
     {
         return $this->all()->where('lang', 'en')->paginate($limit);
     }
     public function store($request)
     {
        DB::beginTransaction();
        try{
            $tag = new Tag();
            $tag->slug = $this->getSlug($request->title,$request->slug);
            $tag->save();

            $request['tag_id'] = $tag->id;
            if($request->lang == ''):
                $request['lang']  =  'en';
            endif;
            $this->tagLang->store($request);

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
            $tag = $this->get($request->tag_id);
            $tag->slug  = $this->getSlug($request->title,$request->slug);
            $tag->save();

            if($request->tag_lang_id == ''):
                $this->tagLang->store($request);
            else:
                $this->tagLang->update($request);
            endif;

            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollback();
            return false;
        }
     }
 }

