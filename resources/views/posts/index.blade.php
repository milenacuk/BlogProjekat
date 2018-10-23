@extends('layouts.master')

@section('title')
All posts
@endsection

@section('body')
    
    <h1>Posts</h1>
    <ul>

    @foreach($posts as $post)
    
    <li>
        <div class="blog-post"> 
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