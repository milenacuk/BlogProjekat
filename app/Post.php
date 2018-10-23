<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable = [
    'title','body', 'published'
   ];

   public static function getPublishedPosts(){
       return Post::where('published', true)->get();
   }
}
