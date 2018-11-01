<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag){
        $posts = $tag->posts()->with('user')->latest()->paginate(10); //kad se klikne na tag vraca sve postove sa tim tagom,od najnovijeg

        return view ('posts.index')->with('posts',$posts);
    }
}
