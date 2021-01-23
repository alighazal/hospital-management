<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @yield('title')

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
       
    </head>
    <body>
    <nav>
        <ul class = "flex bg-red-100 justify-between pr-6 pl-6 pt-3 pb-3">
            <ul  class = "flex flex-row" >
                <li class = "mr-4"><a href="/"> home </a></li>
                <li class = "mr-4"><a href="/hospitals"> hospitals</a></li>
                <li class = "mr-4"><a href="/doctor"> doctors</a></li>
                <li class = "mr-4"><a href="/reservations"> Reservation</a></li>
            </ul>
            <ul class = "flex flex-row" >
            @auth
                <li class = "ml-4"><a href="/profile"> {{Auth::user()->name}}</a></li>
                <form action="/logout" method = "post">
                    @csrf
                    <button class = "ml-4"> logout </button>
                </form>
            @else
                <li class = "ml-4"><a href="/login"> login</a></li>
                <li class = "ml-4"><a href="/register"> register</a></li>
            @endauth
          
            </ul>
        
        </ul>
    </nav>

    @yield('content')
        
    </body>
</html>
