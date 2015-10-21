@extends('layouts/layout_auth')
@section('title')
    Login
@stop
@section('content')

    {!! Form::open(array('url' => '/auth/login', 'method' => 'POST')) !!}
        @include('alerts.messages')
        <div class="form-group">
            {!! Form::label('Your E-mail Address') !!}
            {!! Form::text('email', null, array('required', 'class'=>'form-control', 'placeholder'=>'Your e-mail address')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Your Message') !!}
            {!! Form::password('password', array('required', 'class'=>'form-control', 'placeholder'=>'Your Password')) !!}
        </div>

        <div class="form-group">
            
            {!! Form::label('Remember Me') !!}
            {!! Form::checkbox('remember') !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Login!', array('class'=>'btn btn-primary')) !!}
        </div>
        <div class="form-group">
            <a href="{!!url('/password/email/')!!}">Click here to reset your password</a>
        </div>
    {!! Form::close() !!}

@endsection