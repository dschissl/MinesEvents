<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    
    {{ HTML::script('script/master.js'); }}
    
    {{ HTML::style('css/master.css'); }}
</head>
    
<body>
    <div id="page">
        <header>
            @section('header')
                HEADER
            @show
        </header>
        
        <nav>
            @section('navbar')
                <a href="<?php echo asset('/'); ?>">Home</a>
            @show
        </nav>
        
        <section id="content">
            @yield('content')
        </section>
        
        <footer>
            @section('footer')
                FOOTER
            @show
        </footer>
    </div>
</body>
</html>
