<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Amana Seguros | Home</title>

    <link rel="shortcut icon" href="img/amana2.png" type="image/png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    #div {

    background-color:rgb(237, 84, 65);

    }

    .nav-link {
    color: #f0f2f9 !important;
    }
    
    </style>
</head>
<body>
    <div id="app">
        <nav id="div" class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
              <!--  <a class="navbar-brand" href="{{ url('/') }}"> -->
              <i class="fa fa-user"></i><strong><a href="#" class="text-white"> AMANA SEGUROS</a></strong>
               <!-- </a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><strong><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></strong></li>
                            <li><strong><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></strong></li> 
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
    
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('/img/saude1.jpg')}}"  alt="AAAAA">
                    
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/img/viagem1.jpg')}}"  alt="AAAAA">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/img/trabalho1.jpg')}}"  alt="AAAAA">
                </div>
                
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
    </div>
        
            @yield('content')

                <div class="footer text-muted">
                        <center> <strong>Copyright © 2019 <a href="http://www.amanaseguros.co.mz/" class="text-red">Amana Softwares</a>.</strong> All rights
            reserved.</center>
	            </div>
        </main>
        
    </div>
    
    
</body>
</html>
