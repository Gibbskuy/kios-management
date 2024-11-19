 <nav class="bg-white shadow-md">
     <div class="container mx-auto px-6 py-4 flex justify-between items-center">
         <div class="hidden md:flex md:items-center w-full justify-between">
             <a class="text-2xl font-bold text-gray-800 hover:text-purple-600" href="{{ url('/') }}">
                 KiosArtikelZ
             </a>
             <button class="md:hidden text-gray-800" type="button" id="navbar-toggle">
                 <i class='bx bx-menu text-3xl'></i>
             </button>

             <ul class="flex space-x-6 ml-6 mt-1">
                 @can('artikel-read')
                     <li><a class="nav-link text-gray-700 hover:text-blue-500"
                             href="{{ route('artikel.index') }}">Artikel</a></li>
                     <li><a class="nav-link text-gray-700 hover:text-blue-500"
                             href="{{ route('kategori.index') }}">Kategori</a></li>
                 @endcan
                 @can('admin-read')
                     <li><a class="nav-link text-gray-700 hover:text-blue-500"
                             href="{{ route('content.index') }}">Content</a></li>
                 @endcan
             </ul>

             <ul class="flex space-x-4 items-center justify-center">
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
                             @can('admin-read')
                                 <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="{{ route('users.index') }}">
                                     User <i class='bx bx-home-smile pl-4'></i>
                                 </a>
                                 <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="{{ route('roles.index') }}">
                                     Role <i class='bx bx-home-smile pl-4'></i>
                                 </a>
                             @endcan
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
