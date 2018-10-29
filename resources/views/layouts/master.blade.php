<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/examples/blog/blog.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta charset="UTF-8">    
    <title>@yield('title')</title>
</head>
<body>
    
<main role="main" class="container">
@if($flash = session('message'))
  <div id='flash-message' class = 'alert alert-success'>
  {{ $flash }}
  </div>
@endif
@include('layouts.partials.header')
      <div class="row">
        <div class="col-md-8 blog-main">
        @yield('body') 

          

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          @include('layouts.partials.sidebar')
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

        
    </main><!-- /.container -->
    @include('layouts.partials.footer')
    
</body>
</html>