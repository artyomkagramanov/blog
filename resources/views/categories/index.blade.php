@extends('layouts/layout')
@section('title')
	{{$title}}
@stop
@section('content')

<div class="panel panel-default" style="max-width:350px;margin:0 auto;">
	<div class="panel-heading">
		{{$title}}
		<a class="btn btn-default" href="{{url('/category/create')}}" role="button">Add New Category</a>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Functions</th>
			</tr>
		</thead>

		<tbody>
			@if(count($categories))
				@foreach($categories as $category)
				<tr>
					<th>{{$category->id}}</th>
					<td>
						<a   href="{{url('/category/'.$category->id)}}">{{$category->name}}</a>
					</td>
					<td>
						<a style="display:block; float:left; margin-right:7px;" class='btn btn-primary btn-sm' href="{{url('/category/'.$category->id.'/edit')}}">Edit</a>
						<div onclick="return confirm('Are you sure')" style="display:block; float:left;">						
						    {!! Form::open(array('url' => '/category/'.$category->id, 'method' => 'DELETE')) !!}
						        <div class="form-group">
						            {!! Form::submit('Delete!', array('class'=>'btn btn-danger btn-sm')) !!}
						        </div>
						    {!! Form::close() !!}
						</div>
					</td>		
				</tr>

				@endforeach
			@else
				<tr>
					<td><h2 align="center">Empty!</h2></td>
				</tr>
			@endif	

		</tbody>
	</table>
	
</div>
@stop