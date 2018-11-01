<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
Use App\Comment;

class PostsController extends Controller
{
    public function index(){
        //dd(auth()->user());
        $posts = Post::getPublishedPosts()->paginate(10); //stavili sa ovim paginate da nam na strani bude 10 postova
        return view('posts.index', ['posts'=>$posts]);
    }
    public function show($id){
        $post = Post::with('comments')->findOrFail($id);
        //dd($post);
        return view ('posts.show',['post' => $post]);
    }

    public function create(){
        return view ('posts.create');
    }
    public function store(){
        $this->validate(
            request(),
            Post::VALIDATION_RULES
            );
            
         Post::create(
             array_merge(
                request()->all(),
                [
                    'author_id' => auth()->user()->id
                ]
             )
        );
             
        return redirect('/posts');
    }
}
