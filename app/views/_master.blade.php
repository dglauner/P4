<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
{{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'); }}
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title','My Title')</title>
</head>

<body>
	 <div class="container">
	 	@if(Session::get('flash_message'))
	        <div class="bg-danger">{{ Session::get('flash_message') }}</div>
	    @endif
	    @foreach($errors->all() as $message)
			<div class='bg-danger'>{{ $message }}</div>
		@endforeach


      	<div role="navigation" class="navbar navbar-default">
			<!-- header -->
			<h1 class="text-center">@yield('page_title','Fitness Tracker')</h1>

			@if(Auth::check())
				<a href="/exercise/index" class="btn btn-primary btn-xs">Home</a>
			    <a href='/logout' class="btn btn-primary btn-xs navbar-right">Log out {{ Auth::user()->email; }}</a>
			@else 
			    <a href='/signup' class="btn btn-primary btn-xs">Sign up</a> or <a href='/login' class="btn btn-primary btn-xs">Log in</a>
			@endif
		</div>

      	<!-- main -->
		<div id="container">
		
		@yield('content','My Content')
	
		</div>
	</div>


{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'); }}
{{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'); }}
@yield('/body')

</body>

</html>
