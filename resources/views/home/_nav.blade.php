<nav class="navbar navbar-default">
	<div class="container-fluid">
	<div class="navbar-header">
	  	<a class="navbar-brand" href="{!!url()!!}">Blog.dev</a>
	</div>
		<ul class="pull-left nav navbar-nav">
			<li>
				<a href="{!!url('/post')!!}">Posts <span class="sr-only">(current)</span></a>
			</li>
			<li>
				<a href="{!!url('/category')!!}">Categories</a>
			</li>
			<li>
				<a href="{!!url('/about')!!}">About</a>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
		    <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello - {{{Auth::user()->name}}} <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		           <li>
		           		<a href="{!!url('/auth/logout')!!}">Logout</a>
		           </li>
		        </ul>
		    </li>
      	</ul>
	</div>
</nav>