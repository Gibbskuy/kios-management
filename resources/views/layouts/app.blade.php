<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ecommerce</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/icon.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div id="app">
        <nav class="bg-white shadow-md">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                <a class="text-2xl font-bold text-gray-800" href="{{ url('/') }}">
                    Ecommerce
                </a>
                <button class="md:hidden text-gray-800" type="button" id="navbar-toggle">
                    <i class='bx bx-menu text-3xl'></i>
                </button>

                <div class="hidden md:flex md:items-center w-full justify-between">
                    <!-- Left Side Of Navbar -->
                    <ul class="flex space-x-6 ml-6">
                        <li>
                            <a class="text-gray-700 hover:text-blue-500"
                                href="{{ route('kategori.index') }}">Kategori</a>
                        </li>
                        <li>
                            <a class="text-gray-700 hover:text-blue-500" href="{{ route('produk.index') }}">Produk</a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="flex space-x-4 items-center">
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a class="text-gray-700 hover:text-blue-500" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li>
                                    <a class="text-gray-700 hover:text-blue-500" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="relative">
                                <a class="text-gray-700 hover:text-blue-500 cursor-pointer" href="#" id="user-menu"
                                    aria-haspopup="true">
                                    {{ Auth::user()->name }} <i class='bx bx-chevron-down'></i>
                                </a>
                                <div id="dropdown-menu"
                                    class="hidden absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md z-20">
                                    <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="{{ url('profile') }}">
                                        Profile <i class='bx bx-home-smile pl-4'></i>
                                    </a>
                                    <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout <i class='bx bx-power-off pl-4'></i>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-6">
            @yield('content')
        </main>
    </div>

    <script>
        // Dropdown toggle functionality
        document.getElementById('user-menu').addEventListener('click', function() {
            document.getElementById('dropdown-menu').classList.toggle('hidden');
        });

        // Mobile menu toggle
        document.getElementById('navbar-toggle').addEventListener('click', function() {
            const navbarItems = document.querySelector('.md\\:flex');
            navbarItems.classList.toggle('hidden');
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>



</body>

</html>
