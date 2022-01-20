<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <title>{{ config('app.name', 'CarStallion') }}</title>

    <!-- Scripts -->
    
  
  

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/dropdownmenu.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/5qovufqekkfm6x72on94k5cryet3z5k4he1oprbdzuglbvds/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/5qovufqekkfm6x72on94k5cryet3z5k4he1oprbdzuglbvds/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>


  
      
<style>
        .cardhover:hover {
            background-color: #F3F3F3;
        }

        .sidecardhover:hover {
            background-color: #F3F3F3;
        }

.bx-wrapper {
    margin-bottom: 0px !important;
}

/* BUG FIX FOR CLONE SLIDE FIRST */
.bx-wrapper img {
    max-width: 100%;
    display: inline-block;
}

.bx-viewport li { 
    min-height: 1px; 
    min-width: 1px; 
}

.bx-pager li {
  width: 100px;
  height: 70px;
  display:inline;
}
.bx-pager img {
  width: 100px;
  height: 70px;
}
.bx-wrapper .bx-pager.bx-default-pager a:hover,
.bx-wrapper .bx-pager.bx-default-pager a.active
.bx-wrapper .bx-pager.bx-default-pager a:focus {
background: #000;
max-width: 100px;
}
    </style>   
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm text-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img class="logo" src="{{ asset('images/logo-carstallion.png') }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('used-cars-for-sale') }}" style="padding-top:15px; font-size: 14px; font-weight: 500;">{{ __('Used Vehicles For Sale') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('new-cars-for-sale') }}" style="padding-top:15px; font-size: 14px; font-weight: 500;">{{ __('New Vehicles For Sale') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}" style="color: #000;padding-top:15px;">Login / Register</a>
                                </li>
                            @endif

                            
                        @else
                        
                            <li class="nav-item dropdown">
                                <a style="padding-top: 15px;color:#000;font-weight:bold; width: 100%;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   @if(Auth::check()&& Auth::user()->isadmin==1)
                                    <a class="dropdown-item" href="{{ url('auth/category') }}" >
                                    {{ __('Dashboard') }}
                                </a>
                                @else
                                  
                                        <a class="dropdown-item" href="{{ url('ads') }}">
                                            <i class="fas fa-camera"></i> {{ __('Ads') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ url('messages') }}">
                                            <i class="fas fa-envelope"></i> {{ __('Messages') }}
                                        </a>
                                        @endif
                                  
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                                        style="color:black!important;">
                                        <i class="fas fa-user-lock"></i> {{ __('Logout') }}
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
        </nav>
        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
        

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


        <main class="py-0">
            @yield('content')
        </main>

    </div>
    
    <style>
        body{
            overflow-x: hidden;
        }
       .navbar-nav{
           height: 55px!important;
       }
        .dropdown:hover>.dropdown-menu {
            display: block;
        }

        @media only screen and(max-width:9991px) {
            .navbar-hover .show>.dropdown-toggle::after {
                transform: rotate(-90deg)
            }
        }

        @media only screen and (min-width:492px) {
            .navbar-hover .collapse ul li {
                position: relative;
            }

            .navbar-hover .collapse ul li:hover>ul {
                display: block
            }

            .navbar-hover .collapse ul ul {
                position: absolute;
                top: 100%;
                left: 0;
                min-width: 100px;
                display: none
            }

            .navbar-hover .collapse ul ul ul {
                position: absolute;
                top: 0;
                left: 100%;
                min-width: 200px;
                display: none
            }
            .navbar-nav > li{
                padding-left:3px!important;
                margin-right:3px!important;
            }
            .vertical-menu a {
            background-color: #fff;
            color: #000;
            display: block;
            padding: 12px;
            text-decoration: none;
        }

        .vertical-menu a:hover {
            background-color: rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
            color: #000;
        }
        .vertical-menu a.active {
            background-color: rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
            color: #000;
        }




    </style>


</body>


  
</html>
