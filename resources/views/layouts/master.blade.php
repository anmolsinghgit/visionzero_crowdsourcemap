<!doctype html>
<html>
<style type="text/css">

</style>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Foobooks' --}}
        @yield('title','Foobooks')
    </title>

    <meta charset='utf-8'>

    <link href='/css/main.css' rel='stylesheet'>
    <!-- <link href="/css/safetymap.css" type='text/css' rel='stylesheet'> -->
    <!-- Google Maps and Drawing API -->
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=drawing&sensor=false"></script>

    <!-- Google Charts API -->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'>

   <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet'>
   <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css' rel='stylesheet'>
   <script type="text/javascript" src="/js/main.js"></script>
    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body onload="boston.initialize()">
        <!-- side panel div container -->
        <div id="toc" class="well">

            <div>
                <!-- search form -->
                <form class="form-horizontal">
                    <fieldset>
                        <div class="control-group">
                            <input type="text" id="address">
                            <input type="button" value="find" onClick="boston.geocode()" class="btn btn-primary">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- map div container -->
        <div id="map_canvas"></div>



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
            <li><a href='/logout'>Logout {{ $user->name }}</a></li>
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

    <section>
        {{-- Main page content will be yielded here --}}
        @yield('page-script')
    </section>

    <!-- Button to go into edit mode -->
    <div class="draw-button">
        <span id="edit-button" class="btn " onclick="boston.toggleEditMode()"><i class="icon-pencil"></i> Let me draw on this map</span>
    </div>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
