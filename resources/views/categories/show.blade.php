@extends('layouts/layout')
@section('title')
	{{$title}}
@stop
@section('content')

<div class="panel panel-default" style="max-width:700px; margin:0 auto;">
	<div class="panel-heading">
		{{$title}}
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Created_at</th>
				<th>Updated_at</th>
				
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>{{$category->id}}</th>
				<td>{{$category->name}}</td>
				<td>{{$category->created_at}}</td>
				<td>{{$category->updated_at}}</td>
				
			</tr>
		</tbody>
	</table>
</div>
@stop