<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
class Post extends Model
{
   protected $fillable = [
    'title','body', 'published'
   ];
   const VALIDATION_RULES = [
    'title'=>'required',
    'body'=>'required | min:25',
    'published'=>'required'
   ];
   public static function getPublishedPosts(){
       return Post::where('published', true)->get();
   }
   public function comments(){
       return $this->hasMany(Comment::class);
   }
}
