@extends('layouts/layout_auth')

@section('title')
    Register
@stop

@section('content')
        
    {!! Form::open(array('url' => url('auth/register'), 'method' => 'POST')) !!}
        @include('alerts.messages')
        <div class="form-group">
            {!! Form::label('Your Name') !!}
            {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Your name')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Your E-mail Address') !!}
            {!! Form::text('email', null, array('required', 'class'=>'form-control', 'placeholder'=>'Your e-mail address')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Your Password') !!}
            {!! Form::password('password', array('required', 'class'=>'form-control','placeholder'=>'Password')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Confirm Password') !!}
            {!! Form::password('password_confirmation', array('required', 'class'=>'form-control','placeholder'=>'Confirm Password')) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Register!', array('class'=>'btn btn-primary')) !!}
        </div>
    {!! Form::close() !!}
@endsection