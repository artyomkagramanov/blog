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
<style>
    .thumbnail {
        position: relative;
        padding: 0px;
        margin-bottom: 20px;
    }

        .thumbnail:hover {
            background-color: #5CB85C;
        }

    .votes {
        font-size: 47px;
        color: #197BB5;
        padding: 10px;
    }

    .thumbnail img {
        width: 100%;
    }
    .clear{
      clear:both;
    }
</style>


 </head>
 <body>
 	@include('home/_nav');

	 <div class="container">
	 	@include('alerts/messages')
	 	<div id="content">

  			 <div class="container">
            	@yield('content')
        	</div>

	 	</div>

 </body> 
</html>
