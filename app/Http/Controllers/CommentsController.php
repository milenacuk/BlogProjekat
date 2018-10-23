<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store($id){
        $post = Post::findOrFail($id);
        $this->validate(
            request(),
            Comment::VALIDATION_RULES
            );

        $post->comments()->create(
            request()->all()
        );
        return redirect("/posts/" . $id);
    }
}
