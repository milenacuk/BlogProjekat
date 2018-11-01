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
    'published'=>'required',
    'tags' => 'required |array'  // stavljamo da je tag obavezan i da je niz
   ];
   public static function getPublishedPosts(){
       return Post::where('published', true); //zbog paginacije sam ovde izbrisala get
   }
   public function user(){
       return $this->belongsTo(User::class, 'author_id');
   }
   public function comments(){
       return $this->hasMany(Comment::class);
   }
   public function tags(){
    return $this->belongsToMany(Tag::class);
}
}
