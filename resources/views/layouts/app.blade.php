<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-grey-light">
    <div id="app">
        <nav class="bg-white px-6 shadow">
            <div class="container mx-auto">
                <div class="lg:flex lg:justify-between lg:items-center py-2">
                    <h1 class="w-full flex justify-center">
                        <a href="{{ url('/home') }}">
                            <img src="/images/logo.svg" style="height: 50px;"></img>
                        </a>
                    </h1>

                    <div class="flex justify-center items-center py-2 lg:p-0">
                        <ul class="list-reset flex">
                            @auth
                                <li class="mr-4"><a class="text-sm text-grey no-underline" href="/projects">Projects</a></li>
                                <li><a class="text-sm text-grey no-underline" href="/reminders">Reminders</a></li>
                            @endauth
                        </ul>
                    </div>

                    <div class="flex justify-center items-center py-2 lg:p-0">
                        <ul class="list-reset flex">
                            <!-- Authentication Links -->
                            @guest
                                <li>
                                    <a class="mr-4 text-sm text-grey no-underline" href="{{ route('login') }}">Login</a>
                                </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a class="text-sm text-grey no-underline" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                            @else
                                <li>                              
                                    <a
                                        class="text-red-light text-sm no-underline"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="container mx-auto py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
