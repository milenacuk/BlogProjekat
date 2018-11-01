<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
Use App\Comment;
Use App\Tag;

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
        $tags = Tag::all();   //vadimo sve tagove,dodajemo ispod vrati postove sa tagovima
        return view ('posts.create')->with('tags',$tags);;
    }
    public function store(){
        $this->validate(
            request(),
            Post::VALIDATION_RULES
            );
            
         /*Post::create(
             array_merge(
                request()->all(),
                [
                    'author_id' => auth()->user()->id
                ]
             )
        );*/

        $post = new Post();
        $post->title = request('title');
        $post->body = request('body');
        $post->author_id = auth()->user()->id;
        $post->published = true;

        $post->save();
        
        $post->tags()->attach(request('tags')); //prosledili smo niz tagova koji su na jednom postu,koje smo selektovali na postu koji smo kreirali

        return redirect('/posts');
    }
}
