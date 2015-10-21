@extends('layouts/layout')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		Panel heading
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Created_at</th>
				<th>Updated_at</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)
			<tr>
				<th>$category->id</th>
				<td>$category->name</td>
				<td>$category->description</td>
				<td>$category->created_at</td>
				<td>$category->updated_at</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop