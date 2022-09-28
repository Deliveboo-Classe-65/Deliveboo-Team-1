<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @if (Route::currentRouteName() == 'admin.dishes.edit' || Route::currentRouteName() == 'admin.dishes.create' )
        <script src="{{ asset('js/backend/dishesvalidation.js') }}" defer></script>
    @endif
    @if (Route::currentRouteName() == 'register' )
        <script src="{{ asset('js/backend/registervalidation.js') }}" defer></script>
    @endif

    @if (Route::currentRouteName() == 'admin.orders.index' )
    <script src="{{ asset('js/backend/ordersIndex.js') }}" defer></script>
    @endif

    <script src="{{ asset('js/backend.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
</head>
<body>
    @stack('nameVar')


    <div id="app">
            <header>
                <nav class="navbar navbar-expand-md">
                    <div class="container">
                        <div class="container-fluid justify-content-around">
                            
                            <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav mr-auto">
                                    <a href="{{ url('/') }}">
                                        <img src="{{asset("img/logo-db.png")}}" class="d-inline-block align-text-top w-100">
                                    </a>
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                </ul>
            
                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto gap-2">
                                    <!-- Authentication Links -->
                                    @guest
                                    <li class="nav-item">
                                        <a class="btn btn-light text-primary" href="{{ route('login') }}" role="button">Login</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="btn btn-light text-primary" href="{{ route('register') }}" role="button">Registrati</a>
                                        </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>
            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
            
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

        <main class="py-4">
            <div class="container">

                <div class="row">
                    <div class="col-10">@yield('content')</div>
                    @guest 
                    @else
                    <div class="col-2">
                        @include('admin.components.sidebar')
                    </div>
                    @endguest
                    
                </div>
            </div>
            
        </main>
    </div>
</body>
</html>
