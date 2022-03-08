<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function categorys(){
        return $this->belongsToMany(Category::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
