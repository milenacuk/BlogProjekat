@extends('layouts.master')

@section('title')
Create title
@endsection

@section('body')
<form method = 'post' action = '/register'>

{{ csrf_field() }}
  <div class="form-group">
    <label>Name</label>
    <input name = 'name' type="text" class="form-control" id="name" placeholder="Enter name">
      @include('layouts.partials.error-message', ['field' => 'name'])
  </div>
  <div class="form-group">
    <label>Email</label>
    <input name = 'email' type="text" class="form-control" id="email" placeholder="Enter email">
      @include('layouts.partials.error-message', ['field' => 'email'])
  </div>
  <div class="form-group">
    <label>Password</label>
    <input name = 'password' type="password" class="form-control" id="password" placeholder="Enter password">
      @include('layouts.partials.error-message', ['field' => 'password'])
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection