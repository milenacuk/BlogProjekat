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
        <p>Written by: <a href="/users/{{$post->author_id}}">{{$post->user->name}}</a></p> 
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
    <nav class = 'blog-pagination'>
    <a class = 'btn btn-outline-{{ $posts->currentPage() == 1 ? 'secondary disabled' : 'primary' }}' href="{{ $posts->previousPageUrl() }}">Older</a>
    <a class = 'btn btn-outline-{{ $posts->hasMorePages() ? 'primary' : 'secondary disabled' }}'  href="{{ $posts->nextPageUrl() }}">Next</a>   
    </nav> <!-- dodala sam formu za paginaciju-->
@endsection