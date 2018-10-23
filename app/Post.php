<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
class Post extends Model
{
   protected $fillable = [
    'title','body', 'published'
   ];

   public static function getPublishedPosts(){
       return Post::where('published', true)->get();
   }
   public function comments(){
       return $this->hasMany(Comment::class);
   }
}
