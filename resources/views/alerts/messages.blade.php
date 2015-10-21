@if( session('success') )
	<div class="alert alert-success">{{ session('success') }}</div>
@endif
@if( session('status') )
	<div class="alert alert-success">{{ session('status') }}</div>
@endif
@if( session('warning') )
	<div class="alert alert-warning">{{ session('warning') }}</div>
@endif
@if( session('danger') )
	<div class="alert alert-danger">{{ session('danger') }}</div>
@endif

@if( $errors->has() )
    <div class="alert alert-danger"> 
        @foreach ($errors->all() as $error )
            <p> 
                {{{$error}}}
            </p>
        @endforeach
    </div>
@endif