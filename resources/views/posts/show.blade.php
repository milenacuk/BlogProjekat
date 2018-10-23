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
            <h4>Post a Comment</h4>
            <form method = 'post' action = '/posts/{{$post->id}}/comments'>
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Author</label>
                    <input name = 'author' type="text" class="form-control"  placeholder="Enter author">
                    @include('layouts.partials.error-message', ['field' => 'author'])
                </div>
                <div class="form-group">
                    <label>Text</label>
                    <textarea name = 'text' type="text" class="form-control"  placeholder="Enter text"></textarea>
                    @include('layouts.partials.error-message', ['field' => 'text'])

                </div>              
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
          </div><!-- /.blog-post -->
  
@endsection