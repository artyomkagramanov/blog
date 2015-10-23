@extends('layouts/layout')
@section('title')
    {{$title}}
@stop
@section('content')
<div style="width:200px;margin:0 auto;">    
    @if(isset($category))
    {!! Form::model($category,array('url' => '/category/'.$id, 'method' => 'PUT')) !!}
    @else
    {!! Form::open(array('url' => '/category/', 'method' => 'POST')) !!}
    @endif
        <div class="form-group">
            {!! Form::label('Title') !!}
            {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Enter Category title')) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Save!', array('class'=>'btn btn-primary')) !!}
        </div>
    {!! Form::close() !!}
</div>

@endsection