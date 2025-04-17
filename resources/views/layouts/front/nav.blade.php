<nav class="bg-gradient-to-r from-indigo-800 to-purple-900 shadow-2xl">
    <div class="container mx-auto px-6 py-4">
        <div class="flex flex-wrap items-center justify-between">
            <!-- Logo with Animation -->
            <a class="text-2xl font-bold text-white hover:text-indigo-200 transition duration-300 flex items-center group" href="{{ url('/') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2 transform group-hover:rotate-12 transition-transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm3 1h6v4H7V5zm8 8v2h1v1H4v-1h1v-2a1 1 0 011-1h8a1 1 0 011 1z" clip-rule="evenodd" />
                </svg>
                <span class="tracking-wider font-extrabold">ArtikelZ</span>
            </a>

            <!-- Enhanced Search Bar with Glow Effect -->
            <form action="{{ route('artikel.index') }}" method="GET" class="hidden md:flex items-center bg-white bg-opacity-10 rounded-full px-4 py-2 flex-1 max-w-lg mx-6 backdrop-blur-sm border border-white border-opacity-20 shadow-inner hover:shadow-indigo-500/20 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="search" name="search" value="{{ $search ?? '' }}" placeholder="Search articles..." class="bg-transparent w-full focus:outline-none placeholder-white placeholder-opacity-70 text-white px-3 py-1">
                <button type="submit" class="text-white hover:text-indigo-200 ml-2 transition-all duration-300 transform hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <!-- Hidden field to preserve any category filter -->
                @if(isset($id_kategori) && $id_kategori)
                <input type="hidden" name="id_kategori" value="{{ $id_kategori }}">
                @endif
            </form>

            <!-- Mobile Menu Button with Animation -->
            <button class="md:hidden text-white focus:outline-none transform transition-transform duration-300 hover:scale-110" id="navbar-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <!-- Desktop Navigation Menu with Glass Effect -->
            <div class="hidden md:flex md:items-center space-x-2">
                <a class="text-white hover:text-indigo-200 font-medium px-8 py-2 rounded-lg hover:bg-white hover:bg-opacity-10 transition duration-300 flex items-center backdrop-blur-sm" href="{{ route('artikel.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                    </svg>
                    Artikel
                </a>
                <a class="text-white hover:text-indigo-200 font-medium px-8 py-2 rounded-lg hover:bg-white hover:bg-opacity-10 transition duration-300 flex items-center backdrop-blur-sm" href="{{ route('kategori.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                    </svg>
                    Kategori
                </a>
                @can('admin-read')
                <a class="text-white hover:text-indigo-200 font-medium px-8 py-2 rounded-lg hover:bg-white hover:bg-opacity-10 transition duration-300 flex items-center backdrop-blur-sm" href="{{ route('content.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                    </svg>
                    Content
                </a>
                @endcan

                <!-- Enhanced User Menu -->
                @guest
                <div class="flex space-x-2 ml-2">
                    @if (Route::has('login'))
                    <a class="text-white hover:text-indigo-200 font-medium py-2 px-4 rounded-lg border border-white border-opacity-30 hover:bg-white hover:bg-opacity-10 transition duration-300 backdrop-blur-sm" href="{{ route('login') }}">
                        Login
                    </a>
                    @endif
                    @if (Route::has('register'))
                    <a class="bg-white bg-opacity-20 backdrop-blur-sm text-white font-medium py-2 px-4 rounded-lg hover:bg-opacity-30 transition duration-300 shadow-lg hover:shadow-indigo-500/30" href="{{ route('register') }}">
                        Register
                    </a>
                    @endif
                </div>
                @else
                <div class="relative group ml-2">
                    <button class="text-white hover:text-indigo-200 cursor-pointer flex items-center space-x-1 py-2 px-4 rounded-full bg-white bg-opacity-10 backdrop-blur-sm hover:bg-opacity-20 transition duration-300 border border-white border-opacity-20" id="user-menu">
                        <span>{{ Auth::user()->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- Enhanced Dropdown Menu with Animation -->
                    <div class="absolute hidden group-hover:block right-0 mt-2 w-56 bg-white bg-opacity-95 backdrop-blur-lg shadow-2xl rounded-xl z-20 transform transition-all duration-300 border border-indigo-100 overflow-hidden animate-fadeIn">
                        <div class="py-3 px-4 bg-gradient-to-r from-indigo-50 to-purple-50 border-b border-gray-100">
                            <p class="text-xs text-gray-500">Signed in as</p>
                            <p class="text-sm font-medium text-gray-800 truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <a class="block px-4 py-3 text-gray-700 hover:bg-indigo-50 flex items-center transition duration-200" href="{{ url('profile') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                            Profile
                        </a>
                        @can('admin-read')
                        <a class="block px-4 py-3 text-gray-700 hover:bg-indigo-50 flex items-center transition duration-200" href="{{ route('users.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg>
                            Users
                        </a>
                        {{-- <a class="block px-4 py-3 text-gray-700 hover:bg-indigo-50 flex items-center transition duration-200" href="{{ route('roles.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Roles
                        </a> --}}
                        @endcan
                        <div class="border-t border-gray-100"></div>
                        <a class="block px-4 py-3 text-gray-700 hover:bg-red-50 flex items-center transition duration-200" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                </div>
                @endguest
            </div>
        </div>
    </div>

    <!-- Enhanced Mobile Menu with Glass Effect -->
    <div class="hidden bg-white bg-opacity-95 backdrop-blur-lg py-4 shadow-inner md:hidden" id="mobile-menu">
        <!-- Mobile Search with Enhanced Design -->
        <div class="px-4 pb-4 pt-1">
            <form action="{{ route('artikel.index') }}" method="GET">
                <div class="flex items-center bg-gray-100 bg-opacity-70 rounded-lg px-3 py-2 shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="search" name="search" value="{{ $search ?? '' }}" placeholder="Search articles..." class="bg-transparent w-full focus:outline-none ml-2 text-gray-700">
                    @if(isset($id_kategori) && $id_kategori)
                    <input type="hidden" name="id_kategori" value="{{ $id_kategori }}">
                    @endif
                    <button type="submit" class="text-indigo-600 p-1 transition-transform duration-300 hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <div class="border-t border-gray-200"></div>

        <!-- Enhanced Mobile Menu Links -->
        <ul class="space-y-1 px-4 py-2">
            <li>
                <a class="block text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition duration-300 py-2 px-3 rounded-lg flex items-center transform hover:translate-x-1" href="{{ route('artikel.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                    </svg>
                    Artikel
                </a>
            </li>
            <li>
                <a class="block text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition duration-300 py-2 px-3 rounded-lg flex items-center transform hover:translate-x-1" href="{{ route('kategori.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                    </svg>
                    Kategori
                </a>
            </li>
            @can('admin-read')
            <li>
                <a class="block text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition duration-300 py-2 px-3 rounded-lg flex items-center transform hover:translate-x-1" href="{{ route('content.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                    </svg>
                    Content
                </a>
            </li>
            @endcan
        </ul>

        <div class="border-t border-gray-200 mt-2"></div>

        <!-- Enhanced Mobile User Menu -->
        <div class="px-4 py-3">
            @guest
            <div class="grid grid-cols-2 gap-2">
                @if (Route::has('login'))
                <a class="px-4 py-2 bg-gray-100 text-indigo-600 rounded-lg font-medium hover:bg-gray-200 transition duration-300 text-center shadow-sm hover:shadow-md" href="{{ route('login') }}">
                    Login
                </a>
                @endif
                @if (Route::has('register'))
                <a class="px-4 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg font-medium hover:from-indigo-700 hover:to-purple-700 transition duration-300 text-center shadow-sm hover:shadow-md" href="{{ route('register') }}">
                    Register
                </a>
                @endif
            </div>
            @else
            <div class="space-y-3">
                <div class="flex items-center space-x-3 pb-3 border-b border-gray-100">
                    <div class="h-12 w-12 rounded-full bg-gradient-to-r from-indigo-100 to-purple-100 flex items-center justify-center text-indigo-600 font-bold text-lg shadow-md">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-2 mt-3">
                    <a class="block px-3 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-gray-200 text-center text-sm font-medium transition-all duration-300 shadow-sm hover:shadow" href="{{ url('profile') }}">
                        Profile
                    </a>
                    @can('admin-read')
                    <a class="block px-3 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-gray-200 text-center text-sm font-medium transition-all duration-300 shadow-sm hover:shadow" href="{{ route('users.index') }}">
                        Users
                    </a>
                    {{-- <a class="block px-3 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-gray-200 text-center text-sm font-medium transition-all duration-300 shadow-sm hover:shadow" href="{{ route('roles.index') }}">
                        Roles
                    </a> --}}
                    @endcan
                    <a class="block px-3 py-2 bg-gradient-to-r from-red-50 to-red-100 rounded-lg text-red-600 hover:from-red-100 hover:to-red-200 text-center text-sm font-medium transition-all duration-300 shadow-sm hover:shadow" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();">
                        Logout
                    </a>
                    <form id="mobile-logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
            @endguest
        </div>
    </div>
</nav>

<!-- Enhanced JavaScript for Mobile Menu Toggle with Animation -->
<script>
    document.getElementById('navbar-toggle').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');

        // Add animation to mobile menu toggle button
        this.classList.toggle('rotate-90');
        setTimeout(() => this.classList.toggle('rotate-90'), 300);
    });

    // Enhanced dropdown for user menu with animation
    document.addEventListener('DOMContentLoaded', function() {
    const userMenu = document.getElementById('user-menu');
    if (userMenu) {
        userMenu.addEventListener('click', function(e) {
            e.preventDefault();
            const dropdown = this.nextElementSibling;
            dropdown.classList.toggle('hidden');

            // Close when clicking outside
            const closeDropdown = (event) => {
                if (!dropdown.contains(event.target) && !userMenu.contains(event.target)) {
                    dropdown.classList.add('hidden');
                    document.removeEventListener('click', closeDropdown);
                }
            };

            setTimeout(() => {
                document.addEventListener('click', closeDropdown);
            }, 0);
        });
    }
});
</script>
