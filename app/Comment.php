<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Comment extends Model
{
    protected $guarded = ['id'];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
