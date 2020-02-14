<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900 h-screen antialiased">
    <div id="app">
        <nav class="bg-white flex items-center shadow py-2 px-4">
            <div class="container flex flex-wrap items-center justify-between mx-auto px-4">
                <a class="inline-block mr-4 py-2 text-lg whitespace-no-wrap" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="flex items-center text-gray-600 border border-gray-300 rounded px-3 py-2 md:hidden focus:outline-none focus:shadow-outline"
                        onclick="document.getElementById('menu-collapsable').classList.toggle('hidden');">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                    </svg>
                </button>

                <div class="flex-grow items-center w-full hidden md:flex md:w-auto" id="menu-collapsable">
                    <!-- Left Side Of Navbar -->
                    <ul class="flex flex-col text-gray-600 text-sm md:flex-row md:mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="flex flex-col text-gray-600 text-sm md:flex-row md:ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li>
                                <a class="block py-2 hover:text-gray-800 md:px-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a class="block py-2 hover:text-gray-800 md:px-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li>
                                <a class="block py-2 hover:text-gray-800 md:px-2" href="#">
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li>
                                <a class="block py-2 hover:text-gray-800 md:px-2" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form class="hidden" id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-8">
            @yield('content')
        </main>
    </div>
</body>
</html>
