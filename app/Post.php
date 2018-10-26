<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\User;


class Post extends Model
{
   protected $fillable = [
    'title','body', 'published','author_id'
   ];
   const VALIDATION_RULES = [
    'title'=>'required',
    'body'=>'required | min:25',
    'published'=>'required'
   ];
   public static function getPublishedPosts(){
       return Post::where('published', true)->get();
   }
   public function user(){
       return $this->belongsTo(User::class, 'author_id');
   }
   public function comments(){
       return $this->hasMany(Comment::class);
   }
}
