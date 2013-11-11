<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    
    {{ HTML::script('script/master.js'); }}
    {{ HTML::style('css/master.css'); }}
	{{ HTML::style('css/bootstrap.min.css') }}
	
	{{ HTML::script('js/bootstrap.min.js'); }}
	{{ HTML::script('js/jquery-2.0.3.min.js'); }}
	{{ HTML::style('packages/megaboot/css/bootstrap-formhelpers.min.css') }}
	{{ HTML::script('packages/megaboot/js/bootstrap-formhelpers.min.js'); }}
	
</head>
    
<body>
    <div id="page">
        <header>
            @section('header')
				<h1>Mines Events</h1>
				<p>Find out what's happening on campus</p>
            @show
        </header>

        <nav>
            @section('navbar')
				<ul class="nav nav-pills nav-justified">
					<li class="active"><a href="<?php echo asset('/'); ?>">Home</a></li>
					<li><a href="<?php echo asset('newevent'); ?>">Create Event</a></li>
					<li><a href="">My Account</a></li>
					<li><a href="">About</a></li>
				</ul>
            @show
        </nav>
        
        <section id="content">
            @yield('content')
        </section>
        
        <footer>
            @section('footer')
                &copy; Copyright 2013 Derek Schissler, Kolten Robison, Tyler Lyons
            @show
        </footer>
    </div>
</body>
</html>
