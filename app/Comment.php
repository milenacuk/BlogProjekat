<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Comment extends Model
{
    protected $guarded = ['id'];
   const VALIDATION_RULES = [
    'author'=>'required | max:10 | string',
    'text'=>'required | min:25',               
];
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
