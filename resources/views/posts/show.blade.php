@extends('layouts.master')

@section('title')
    {{$post->title}}
@endsection
    
    @section('body')
    <h2>
        <a href="/posts">
             All posts 
        </a>
    </h2>

    <div class="blog-post"> 
            <h2 class="blog-post-title">
                
                    {{$post->title}}
                
            </h2>
            <p> {{$post->body}}</p>  
            @if(count($post->comments))   
                <h4>Comments</h4>
                <ul class = 'list-unstyled'>
                @foreach($post->comments as $comment)
                <li>
                    <p><strong>Author:</strong> {{$comment->author}} </p>
                    <p> {{$comment->text}} </p>
                </li>
                @endforeach
                </ul>
            @endif   
          </div><!-- /.blog-post -->
  
@endsection