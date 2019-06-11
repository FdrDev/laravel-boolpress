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

        {{-- Fonts --}}
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>

        <header>
          <div class="header-container">

            <h1><a href="{{route('home.post')}}">Boolpress</a></h1>
            <h3><a href="{{route('new.post')}}">New Post</a></h3>

            {{-- #############AUTHENTICATION############### --}}
            <ul class="ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
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
                @endguest
            </ul>
            {{-- ##########END###AUTHENTICATION############# --}}
          </div>

        </header>


        {{-- ##############CONTENT############## --}}

          @yield('content')

        {{-- ###########END CONTENT############## --}}


        <footer>
          <h3>Welcome to Boolpress | It's like WordPress but made with much love</h3>
        </footer>
    </body>
</html>
