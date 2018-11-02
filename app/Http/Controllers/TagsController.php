<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{

    public function __construct(){ //zastitila sam da korisnik ne moze da preko sidebara,tagova udje u posts,vec mora da se registruje
        $this->middleware('auth');
    }
    public function index(Tag $tag){
        $posts = $tag->posts()->with('user')->latest()->paginate(10); //kad se klikne na tag vraca sve postove sa tim tagom,od najnovijeg

        return view ('posts.index')->with('posts',$posts);
    }
}
