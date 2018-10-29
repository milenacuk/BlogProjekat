@extends('layouts.master')

@section('body')
        

    <ul>

    @foreach($user->posts as $post)
    
    <li>
        <div class="blog-post"> 
        <p>Written by: {{$user->name}}</p> 
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