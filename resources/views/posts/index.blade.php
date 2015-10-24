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
	  <div style="max-width:1100px;margin:0 auto; padding-top:20px;">
	  	@foreach($posts as $post)	
	  		<div class="col-xs-12 col-sm-6 col-md-3">
            	<div class="thumbnail">
	                <img src="{!!url('/images/'.$post->image)!!}" alt="">
	                <div class="caption">
	                    <h4 class="text-center">{{$post->title}}</h4>
	                    <p>
	                        {{$post->description}}
	                    </p>
	                    <p class="text-center">
	                        
	                        <a href="{{url('/post/'.$post->id.'/edit')}}" class="btn btn-info" role="button" style="display:block; float:left;">Edit</a>
	                        <div onclick="return confirm('Are you sure')" style="display:block; float:left;margin-left:10px;">						
							    {!! Form::open(array('url' => '/post/'.$post->id, 'method' => 'DELETE')) !!}
							        <div class="form-group">
							            {!! Form::submit('Delete!', array('class'=>'btn btn-danger btn-sm')) !!}
							        </div>
							    {!! Form::close() !!}
							</div>
							<div class="clear"></div>
	                    </p>
	                    
	                    	@foreach($post->categories as $category)
	                    		<p>
	                    			{{{$category->name}}}
	                    		</p>
	                    	@endforeach
	            	</div>
            	</div>
        	</div>
        @endforeach
        <div class="clear"></div>
	  </div>
	 


</div>
@stop