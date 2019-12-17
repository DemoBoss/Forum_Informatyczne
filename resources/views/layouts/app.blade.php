<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>




    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ URL::asset('fingerprint2.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>




    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img style="width: 300px; height: auto " src="{{asset("images/logo2.png")}}"
                     alt="Responsive image">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                        <li class="nav-item">
                            <a class="nav-link" style="font-size: 20px" href="{{ route('login') }}">{{ __('Logowanie') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" style="font-size: 20px" href="{{ route('register') }}">{{ __('Rejestracja') }}</a>
                            </li>
                        @endif

                    @else
                        <li class="nav-item dropdown">


                            <a style="font-size: 20px" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            {{--przejście do profilu--}}
                            <div id="navbarDropdown" class="dropdown-menu dropdown-menu-right"  >
                                <a class="dropdown-item a1" href="{{ url('/profile') }}">
                                    Profil
                                </a>
                                {{--przejście do panelu zarządzania--}}
                                @if(Auth::user()->role_name == "Admin")
                                    <a class="dropdown-item a1" href="{{ url('/zarzadzanie') }}">
                                        Zarządzaj
                                    </a>

                                @endif
                                <a class="dropdown-item a1" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Wyloguj
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                    @csrf
                                </form>

                            </div>

                        </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main  style="background-color: #5a6268;">
        <div class = "container" style="background-color: #4e555b; padding: 25px ">
            @yield('content')
        </div>

    </main>
</div>
</body>

</html>
