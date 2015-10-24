@extends('layouts/layout')
@section('title')
    {{$title}}
@stop
@section('content')
<div style="width:200px;margin:0 auto;">    
    @if(isset($post))
    {!! Form::model($post,array('url' => '/post/'.$id, 'method' => 'PUT','files' => true)) !!}
    @else
    {!! Form::open(array('url' => '/post/', 'method' => 'POST','files' => true)) !!}
    @endif
        <div class="form-group">
            {!! Form::label('Title') !!}
            {!! Form::text('title', null, array('required', 'class'=>'form-control', 'placeholder'=>'Enter  Title')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Description') !!}
            {!! Form::textarea('description', null, array('required', 'class'=>'form-control', 'placeholder'=>'Enter  Description')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Select Image') !!}
            {!! Form::file('post_image', null, array('required', 'class'=>'form-control')) !!}
        </div>
        <div class="form-group">
            @if(isset($post))
            
                @foreach($categories as $category)
                    {!! Form::label($category->name) !!}
                    {!! Form::checkbox('category_'.$category->id, $category->id, in_array( $category->id , $post->categories->lists('id')->toArray())) !!}
                @endforeach
            
            @else

                @foreach($categories as $category)
                    {!! Form::label($category->name) !!}
                    {!! Form::checkbox('category_'.$category->id, $category->id) !!}
                @endforeach
                
            @endif

        </div>
        <div class="form-group">
            {!! Form::submit('Save!', array('class'=>'btn btn-primary')) !!}
        </div>
    {!! Form::close() !!}
</div>

@endsection