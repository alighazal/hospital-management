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
        <div class = "flex bg-red-100 justify-between pr-6 pl-6 pt-3 pb-3">
            <div  class = "flex flex-row" >
                <div class = "mr-4">home</div>
                <div class = "mr-4">hospitals</div>
                <div class = "mr-4">doctors</div>
                <div class = "mr-4">Reservation</div>
            </div>
            <div class = "flex flex-row" >
                <div class = "ml-4">User Name</div>
                <div class = "ml-4">login</div>
                <div class = "ml-4">logout</div>
                <div class = "ml-4">register</div>
            </div>
        
        </div>
    </nav>

    @yield('content')
        
    </body>
</html>
