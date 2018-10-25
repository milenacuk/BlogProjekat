@extends('layouts.master')

@section('title')
Login User
@endsection

@section('body')
<h2>Login User</h2>
<form method = 'post' action = '/login'>

{{ csrf_field() }}

  
  <div class="form-group">
    <label>Email</label>
    <input name = 'email' type="text" class="form-control" id="email" placeholder="Enter email">
      
  </div>
  <div class="form-group">
    <label>Password</label>
    <input name = 'password' type="password" class="form-control" id="password" placeholder="Enter password">
     
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@if (count($errors->all()))
  @foreach($errors->all() as $error)
    <div class = "alert alert-danger">
      {{ $error }}
    </div>
      @endforeach
    @endif
@endsection