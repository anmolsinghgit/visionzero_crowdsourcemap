<!doctype html>
<html>
<style type="text/css">

</style>

    <title>
        {{-- Yield the title if it exists, otherwise default to 'Foobooks' --}}
        @yield('title','Foobooks')
    </title>

    <meta charset='utf-8'>

    <link href='/css/main.css' rel='stylesheet'>
    <!-- <link href="/css/safetymap.css" type='text/css' rel='stylesheet'> -->
    <!-- Google Maps and Drawing API -->
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=drawing&sensor=false"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet'>
    <script type="text/javascript" src= 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
    <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css' rel='stylesheet'>
    <script type="text/javascript" src="/js/main.js"></script>



<body onload="boston.initialize()">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">DWA15 Spring 2016</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="http://p1.loosine.com" class= "external">Home</a></li>
                <li><a href="http://p2.loosine.com" class= "external">Project 2</a></li>
                <li><a href="http://p3.loosine.com">Project 3</a></li>
                <li class="active"><a href="#">Project 4</a></li>
                <li class="active"><a href="https://github.com/lvartani/p4">Github</a></li>
            </ul>
        </div>
    </nav>


    <header>
        <img id ="logo"
        src='/images/311head.png'
        alt='Safetymap Logo'>
        <button type="button" id ="about" class="btn btn-primary" data-toggle="modal" data-target="#myModal">About this project</button>

    </header>


    <div class="map_search">
            <input type="text" id="address">
            <input type="button" value="find address on map" onClick="boston.geocode()" class="btn btn-primary">
    </div>
    <br>

        <!-- map div container -->
        <div id="map_canvas"></div>


        @if(Session::get('message')!= null)
                <div class= 'flash_message'>{{Session::get('message')}}</div>
        @endif

    <nav>
       <ul class = "bottom_nav">
           @if(Auth::check())
            <li><a href='/index'>View all incidents</a>
            <li><a href='/view'>View my safety concerns</a>
            <li><a href='/create'>Add new safety concern</a></li>
            <li><a href='/logout'>Logout {{ $user->name }}</a></li>
            @else
            <li><a href='/index'>View all incidents</a>
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




    <!-- <footer>
        &copy; {{ date('Y') }}
    </footer> -->



    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')



    <!-- Modal -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" id="myModal">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div id="about_content">
                <h2>Boston Safety Application</h2>
                <h4>A application to report safety concerns in Boston.</h4>
                <h4>Description</h4>
                    <p>User submitted information safety issues and "nearly missed" traffic concerns
                    will be to locate zones in the city that are particular dangerous to cyclists, pedestrians, and mototirst.
                    </p>
                    <p>This project is an extension of the Vision Zero initiative. <a href="http://www.visionzeroinitiative.com/" >Vision Zero</a> is a multi-national road traffic safety project that aims to achieve a highway system with no fatalities or serious injuries in road traffic.
                    It started in Sweden and was approved by their parliament in October 1997. We hope to continue this emphasis of street safety in Boston. </p>
            </div>
        </div>
      </div>
    </div>
</body>
</html>
