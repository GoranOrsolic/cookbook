<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cookbook</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
       
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #fff;
}

.form-signin {
  width: 100%;
  padding: 15px;
  margin: auto;
}

.form-signin .form-control:focus {
  z-index: 2;
}

font-family: 'Patrick Hand', cursive;

        </style>
    
    </head>
    <!-- <body class="center">
        <div class="center">
            <a class="" href="{{ url('home') }}">
                <img src="{{ asset('storage/Untitled-1.png') }}">
            </a>
            @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endif
            @endif
            </div>
            
    </body> -->
    <body class="text-center">
    <form class="form-signin">
        <img href="{{ url('home') }}" class="mb-4 text-center" src=" {{ asset('storage/Untitled-1.png') }}">
        <p style="font-family: 'Patrick Hand'; font-size: 30px;" ">Objavljujte vaše recepte, isprobajte recepte drugih korisnika...dobar tek</p>
    <div>
    @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-outline-dark">Home</a>
                    @else

                        <a href="{{ url('/home') }}" class="btn btn-outline-dark">Home</a>
                        <a href="{{ route('login') }}" class="ml-4 btn btn-outline-dark">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 btn btn-outline-dark">Register</a>
                        @endif
                    @endif
            @endif
            </div>  
</form>
</body>
</html>
