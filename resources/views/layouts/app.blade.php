<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BlogApp') }}</title>


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="">
                        {{ config('app.name', 'blogApp') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home')}}">Home</a>
                            </li>
                            
                            @if(Gate::check('Admin') || Gate::check('Editor'))
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="{{route('post.create')}}" class="nav-link" >New Post</a>
                            </li>

                            @endif 
                            @if(Gate::check('Admin'))
                            <li class="nav-item dropdown">
                                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" 
                                   aria-expanded="false" class="nav-link dropdown-toggle">More</a>
                                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                    <li><a href="{{route('user')}}" class="dropdown-item">Users </a></li>
                                    <li><a href="{{route('view.post')}}" class="dropdown-item">Post</a></li>
                                    <li><a href="{{route('category.index')}}" class="dropdown-item">Category</a></li>

                                    <li class="dropdown-divider"></li>
                                </ul>
                            </li>
                            @endif  
                             <li class="nav-item">
                                <a class="nav-link" href="">Contact Us</a>
                            </li>
                        </ul>
                        <!-- SEARCH FORM -->
                        <form class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                        </ul>
                    </div>
                </div>
                <span style="color:green;">Welcome  You Logined As {{Auth::user()->role}}</span>
             @endguest
            </nav>
            
            <section class="content-wrapper">
                @if (Session::has('success') || Session::has('error') || Session::has('warning'))
                <div style="margin: 10px 10px" class="alert @if (Session::has('success'))
                     alert-success @elseif(Session::has('error')) alert-danger 
                     @else alert-warning "@endif role="alert" >
                    @if (Session::has('success'))
                    <h5><i class="icon fa fa-check"></i>{!! Session::get('success') !!} </h5>
                @elseif(Session::has('error'))
                    <h5><i class="icon fa fa-ban"></i>{!! Session::get('error') !!} </h5>
                @else
                    <h5><i class="icon fa fa-warning"></i>{!!  Session::get('warning') !!} </h5>
                    @endif
                  
                </div>
                @endif
                @yield('content')
                @include('layouts.footer')
            </section>>
        </div>
        <!-- Scripts -->
<!--        <script src="{{ asset('js/app.js') }}" defer></script>-->
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

        @yield('script')
     <script>  
$('div.alert').delay(5000).slideUp(200);
</script>
    </body>
</html>
