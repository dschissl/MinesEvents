<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    
    {{ HTML::script('script/master.js'); }}
    {{ HTML::style('css/master.css'); }}
	{{ HTML::style('css/bootstrap.min.css') }}
	
	{{ HTML::script('js/bootstrap.min.js'); }}
	
</head>
    @if(Auth::check())
	<div class="navbar navbar-fixed-top">
      <div class="container">
	  <p>You are logged in</p>
	  </div>
	</div>
	@else
	<div class="navbar navbar-fixed-top">
      <div class="container">
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" action="<?php echo asset('/index.php/authenticate'); ?>" method="post" >
            <div class="form-group">
              <input type="text" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
			<a href="<?php echo asset('/index.php/newaccount'); ?>" class="tab register">Not a member?</a>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
	@endif
<body>
    <div id="page">
        <header>
            @section('header')
				<h1 class="headertext">Mines Events</h1>
				<p class="headertext">Find out what's happening on campus</p>
            @show
        </header>

        <nav>
            @section('navbar')
				<ul class="nav nav-pills nav-justified">
					<li><a href="<?php echo asset('/index.php/'); ?>">Home</a></li>
					<li><a href="<?php echo asset('/index.php/newevent'); ?>">Create Event</a></li>
					<li><a href="<?php echo asset('/index.php/account'); ?>">My Account</a></li>
					<li><a href="<?php echo asset('/index.php/about'); ?>">About</a></li>
				</ul>
            @show
        </nav>
        
        <section id="content">
            @yield('content')
        </section>
        
        <footer>
            @section('footer')
                Copyright &copy; 2013 Derek Schissler, Kolten Robison, Tyler Lyons
            @show
        </footer>
    </div>
</body>
</html>
