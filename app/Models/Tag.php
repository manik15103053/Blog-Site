<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','slug','description'
    ];

    public function tagLanguage(){

        return $this->hasMany(TagLanguage::class);
    }

    public function getTranslation($field, $lang = 'en'){

        $tag_translation = $this->hasMany(TagLanguage::class)->where('lang', $lang)->first();

        if(blank($tag_translation)):
            $tag_translation = $this->hasMany(TagLanguage::class)->where('lang', 'en')->first();
        endif;

        return $tag_translation->$field;
    }
}
