@extends('layouts/layout')
@section('title')
	{{$title}}
@stop
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		{{$title}}
		<a class="btn btn-default" href="{{url('/post/create')}}" role="button">Add New Post</a>
	</div>
	  <div style="max-width:1100px;margin:0 auto;">
			<div style="margin:0 auto;max-width:980px;">
			@foreach($posts as $post)
				<article style="float:left;max-width:300px; border:1px solid gray; margin:20px 10px 0 0; overflow:hidden;border-radius:10px;">
					<h2 style="text-align:center;">{{$post->title}}</h2>
					<img src="{!!url('/images/'.$post->image)!!}" style="width:100px; height:140px;float:left; margin-right:10px;"/>
					{{$post->description}}
					@foreach($post->categories as $category)
						<div>
							{{{$category->name}}}
						</div>
					@endforeach
				</article>
				
				 
			@endforeach
		</div>
			<div style="clear:both;"></div>
	  </div>

</div>
@stop