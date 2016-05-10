<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Foobooks' --}}
        @yield('title','Foobooks')
    </title>

    <meta charset='utf-8'>
    <link href="/css/safetymap.css" type='text/css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'>

   <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet'>
   <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>



    <header>
        <img
        src='/images/311head.png'
        alt='Safetymap Logo'>
    </header>
        @if(Session::get('message')!= null)
                <div class= 'flash_message'>{{Session::get('message')}}</div>
        @endif

    <nav>
       <ul>
           @if(Auth::check())
            <li><a href='/'>View all incidents</a>
            <li><a href='/practice'>Add new safety concern</a></li>
            <li><a href='/logout'>Logout</a></li>
            @else
            <li><a href='/'>View all incidents</a>
            <li><a href='/login'>Login</a></li>
            <li><a href='/register'>Register</a></li>
            @endif
        </ul>
   </nav>

    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
