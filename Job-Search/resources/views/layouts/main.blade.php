<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Job Search') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @livewireStyles

        @yield('styles')

        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('libs/css/normalize.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('libs/css/bootstrap.min.css') }}">
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('libs/css/datatables.min.css') }}"> --}}

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
        <script src="{{asset('libs/js/jquery.min.js')}}" defer></script>
        <script src="{{asset('libs/js/popper.min.js')}}" defer></script>
        <script src="{{asset('libs/js/bootstrap.min.js')}}" defer></script>

        {{-- <script src="{{asset('libs/js/dataTables.min.js')}}" defer></script> --}}


        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.22/af-2.3.5/b-1.6.5/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.css" />
        <script type="text/javascript"
            src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.22/af-2.3.5/b-1.6.5/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.js">
        </script>

    </head>

    <body>
        <header>
            <div class="container-fluid bg-light">
                <div class="d-flex justify-content-between align-items-center w-100">
                    {{-- Start Left Navbar --}}
                    <div class="row">
                        <a href="{{route('index')}}" class="nav-link">
                            <img class="logo mr-4 col-3" src="{{asset('images/icons/icon.png')}}" />
                        </a>
                        @auth
                        @switch(Auth::user()->role->id)
                        @case(1)
                        <ul class="nav" id="">
                            <li class="nav-item d-flex align-items-center">
                                <a href="{{route('index')}}" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <a href="{{route('admin.management')}}" class="nav-link">Admin Management</a>
                            </li>
                        </ul>
                        @break
                        @case(2)
                        <ul class="nav" id="">
                            <li class="nav-item d-flex align-items-center">
                                <a href="{{route('index')}}" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <a href="{{route('curriculum-vitae.index')}}" class="nav-link">My CV</a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <a href="{{route('company.index')}}" class="nav-link">My Company</a>
                            </li>
                        </ul>
                        @break
                        @default
                        @break
                        @endswitch
                        @endauth
                    </div>
                    {{-- End Left Navbar --}}
                    {{-- Start Right Navbar --}}
                    @auth
                    <div>
                        <x-navigation-dropdown />
                    </div>
                    @endauth
                    @guest
                    <div>
                        <ul class="nav" id="">
                            @if (Route::has('login'))
                            <li class="nav-item d-flex align-items-center">
                                <a href="{{ route('login') }}" class="btn text-info">Login</a>
                            </li>
                            @endif
                            @if (Route::has('register'))
                            <li class="nav-item d-flex align-items-center">
                                <a href="{{ route('register') }}" class="btn text-info">Register</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    @endguest
                    {{-- End Right Navbar --}}
                </div>
            </div>
        </header>

        <main class="" styles="min-height: 88vh;">
            @yield('content')
        </main>

        <footer>
            <div class="bg-light p-3 d-flex justify-content-center align-items-center">
                <h6 class="text-center">
                    Copyright &copy; {{ now()->year }} <span class="mx-1"> - </span> <a href="{{route('index')}}"
                        class="text-primary">{{config('app.name')}}</a>
                </h6>
            </div>
        </footer>

        @yield('scripts')
        @stack('modals')
        @livewireScripts
    </body>

</html>
