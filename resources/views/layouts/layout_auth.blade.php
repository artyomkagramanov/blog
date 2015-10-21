<!DOCTYPE html>
<html>
 <head>
   <title>@yield('title')</title>
   <meta charset="utf-8">
   <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">

  <!-- Optional theme -->
  <link rel="stylesheet" href="{{ url('/css/bootstrap-theme.min.css') }}">
  <script src="{{ url('/js/jquery-1.11.3.js') }}"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="{{ url('/js/bootstrap.min.js') }}"></script>


 </head>
 <body>
 	@include('auth/_nav');
	 <div class="container">
	 	
	 	<div id="content">

  			 <div class="container">
            	@yield('content')
        	</div>

	 	</div>

 </body> 
</html>