@extends('layouts.master')

@section('title')
    Create post
@endsection

@section('body')
<form method = 'post' action = '/posts'>

{{ csrf_field() }}
  <div class="form-group">
    <label>Title</label>
    <input name = 'title' type="text" class="form-control" id="title" placeholder="Enter title">
      @include('layouts.partials.error-message', ['field' => 'title'])
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea name = 'body' type="text" class="form-control" id="body" placeholder="Enter body"></textarea>
      @include('layouts.partials.error-message', ['field' => 'body'])

  </div>
  <div class="form-group form-check">
    <input name = 'published'  type="checkbox" checked = 'true' value ='1' class="form-check-input" id="publish">
    <label class="form-check-label" for="exampleCheck1">Publish this post?</label>
  </div>
  
  <!-- pravimo check box kad se kreira post da se odmah oznaci tag-->
<div class = 'form-group'>
<label >Select tags</label> <br>
@foreach($tags as $tag)
  <input type="checkbox" name = 'tags[]' value = '{{ $tag->id }}'>
  {{ $tag->name }} <br>
@endforeach
@include('layouts.partials.error-message', ['field' => 'tags'])
</div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection