@extends('layouts.master')

@section('title')
All posts
@endsection

@section('body')
        <a href="/posts/create">
            <h2>Create post</h2>
        </a>

    <ul>

    @foreach($posts as $post)
    
    <li>
        <div class="blog-post"> 
        <p>Written by: {{$post->user->name}}</p> 
            <h2 class="blog-post-title">
                <a href="/posts/{{$post->id}}">
                    {{$post->title}}
                </a>                
                              
            </h2>
            <p> {{$post->body}}</p>           
          </div><!-- /.blog-post -->
          </li>

        <!--<li><a href="/posts/{{$post->id}}">{{$post->title}}</a></li>-->
    @endforeach
    </ul>
@endsection