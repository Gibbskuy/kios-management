<nav class="bg-gradient-to-r from-indigo-600 to-purple-600 shadow-lg">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <!-- Logo -->
        <a class="text-3xl font-bold text-white hover:text-indigo-200 transition duration-300 flex items-center"
            href="{{ url('/') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm3 1h6v4H7V5zm8 8v2h1v1H4v-1h1v-2a1 1 0 011-1h8a1 1 0 011 1z" clip-rule="evenodd" />
            </svg>
            KiosArtikelZ
        </a>

        <!-- Mobile Menu Button -->
        <button class="md:hidden text-white focus:outline-none" id="navbar-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>

        <!-- Navbar Menu -->
        <div class="hidden md:flex md:items-center md:w-full justify-between">
            <ul class="flex px-72">
                <li class="px-5">
                    <a class="text-white hover:text-indigo-200 font-medium transition duration-300 flex items-center"
                        href="{{ route('artikel.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                        </svg>
                        Artikel
                    </a>
                </li>
                <li class="px-5">
                    <a class="text-white hover:text-indigo-200 font-medium transition duration-300 flex items-center"
                        href="{{ route('kategori.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                        Kategori
                    </a>
                </li>
                @can('admin-read')
                <li class="px-5">
                    <a class="text-white hover:text-indigo-200 font-medium transition duration-300 flex items-center"
                        href="{{ route('content.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                        </svg>
                        Content
                    </a>
                </li>
                @endcan
            </ul>

            <!-- User Menu -->
            <ul class="flex space-x-6 items-center">
                @guest
                @if (Route::has('login'))
                <li>
                    <a class="text-white hover:text-indigo-200 font-medium py-2 px-4 rounded-lg border border-white hover:bg-white hover:bg-opacity-10 transition duration-300"
                        href="{{ route('login') }}">
                        Login
                    </a>
                </li>
                @endif
                @if (Route::has('register'))
                <li>
                    <a class="bg-white text-indigo-600 font-medium py-2 px-4 rounded-lg hover:bg-indigo-100 transition duration-300"
                        href="{{ route('register') }}">
                        Register
                    </a>
                </li>
                @endif
                @else
                <li class="relative group">
                    <a class="text-white hover:text-indigo-200 cursor-pointer flex items-center space-x-1 py-1 px-3 rounded-full bg-white bg-opacity-10 hover:bg-opacity-20 transition duration-300"
                        href="#" id="user-menu">
                        <span>{{ Auth::user()->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <!-- Dropdown Menu -->
                    <div class="absolute hidden group-hover:block right-0 mt-2 w-52 bg-white shadow-xl rounded-lg z-20 transform transition duration-200 border border-gray-100 overflow-hidden">
                        <a class="block px-4 py-3 text-gray-700 hover:bg-indigo-50 flex items-center"
                            href="{{ url('profile') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                            Profile
                        </a>
                        @can('admin-read')
                        <a class="block px-4 py-3 text-gray-700 hover:bg-indigo-50 flex items-center"
                            href="{{ route('users.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg>
                            Users
                        </a>
                        <a class="block px-4 py-3 text-gray-700 hover:bg-indigo-50 flex items-center"
                            href="{{ route('roles.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Roles
                        </a>
                        @endcan
                        <div class="border-t border-gray-100"></div>
                        <a class="block px-4 py-3 text-gray-700 hover:bg-red-50 flex items-center"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V4a1 1 0 00-1-1H3zm5 4a1 1 0 00-1 1v4a1 1 0 002 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                <path d="M9 13a1 1 0 102 0V8a1 1 0 10-2 0v5z" />
                            </svg>
                            Logout
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

    <!-- Mobile Menu (Hidden by default) -->
    <div class="hidden bg-white px-4 py-4 shadow-inner md:hidden" id="mobile-menu">
        <ul class="space-y-3">
            <li>
                <a class="block text-gray-700 hover:text-indigo-600 transition duration-300 py-2 flex items-center"
                    href="{{ route('artikel.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                    </svg>
                    Artikel
                </a>
            </li>
            <li>
                <a class="block text-gray-700 hover:text-indigo-600 transition duration-300 py-2 flex items-center"
                    href="{{ route('kategori.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                    </svg>
                    Kategori
                </a>
            </li>
            @can('admin-read')
            <li>
                <a class="block text-gray-700 hover:text-indigo-600 transition duration-300 py-2 flex items-center"
                    href="{{ route('content.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                    </svg>
                    Content
                </a>
            </li>
            @endcan

            <div class="border-t border-gray-200 pt-3">
                @guest
                <div class="flex space-x-2">
                    @if (Route::has('login'))
                    <a class="px-4 py-2 bg-gray-100 text-indigo-600 rounded-lg font-medium hover:bg-gray-200 transition duration-300 flex-1 text-center"
                        href="{{ route('login') }}">
                        Login
                    </a>
                    @endif
                    @if (Route::has('register'))
                    <a class="px-4 py-2 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition duration-300 flex-1 text-center"
                        href="{{ route('register') }}">
                        Register
                    </a>
                    @endif
                </div>
                @else
                <div class="space-y-2">
                    <p class="text-gray-500 text-sm">Login sebagai</p>
                    <p class="font-medium text-gray-800">{{ Auth::user()->name }}</p>
                    <div class="grid grid-cols-2 gap-2 mt-2">
                        <a class="block px-3 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-gray-200 text-center text-sm"
                            href="{{ url('profile') }}">
                            Profile
                        </a>
                        @can('admin-read')
                        <a class="block px-3 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-gray-200 text-center text-sm"
                            href="{{ route('users.index') }}">
                            Users
                        </a>
                        <a class="block px-3 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-gray-200 text-center text-sm"
                            href="{{ route('roles.index') }}">
                            Roles
                        </a>
                        @endcan
                        <a class="block px-3 py-2 bg-red-100 rounded-lg text-red-600 hover:bg-red-200 text-center text-sm"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </div>
                </div>
                @endguest
            </div>
        </ul>
    </div>

    <!-- JavaScript for Mobile Menu Toggle -->
    <script>
        document.getElementById('navbar-toggle').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</nav>
