<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <title>Laravel</title>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            @include('inc.navbar')
            <div class="container">
                @if(Request::is('/'))
                    @include("inc.showcase")
                @endif
                <div class="row">
                        <div class="col-md-8">
                            @include('inc.message')
                            @yield('content')
                        </div>
                        <div class="col-md-4">
                            @include('inc.sidebar')
                        </div>
                </div>
            </div> 
        </div>
        <footer id="footer" class="text-center">
            2019
        </footer>
    </body>
</html>
