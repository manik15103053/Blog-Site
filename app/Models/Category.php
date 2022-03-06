<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','slug','description',
    ];
    public function categoryLanguage(){
        return $this->hasMany(CategoryLanguage::class);
    }
    public function getTranslation($field, $lang = 'en')
    {
        $category_translation = $this->hasMany(CategoryLanguage::class)->where('lang' , $lang)->first();

        if(blank($category_translation)):
            $category_translation = $this->hasMany(CategoryLanguage::class)->where('lang','en')->first();
        endif;
        return $category_translation->$field;
    }
}
