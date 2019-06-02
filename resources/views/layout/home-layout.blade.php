<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- ADD MY STYLE --}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        {{-- ADD MY JS --}}
        <script src="{{ mix('js/app.js') }}" charset="utf-8"></script>

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <header>
          <h1><a href="{{route('home.post')}}">Boolpress</a></h1>
          <h3><a href="{{route('new.post')}}">New Post</a></h3>
        </header>


        @yield('content')

        <footer>
          <h3>Welcome to Boolpress | It's like WordPress but made with much love</h3>

        </footer>
    </body>
</html>
