@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-12 px-6">
        <!-- Profile Section -->
        <div class="max-w-5xl mx-auto mb-16">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md mb-6 shadow-md transition-all duration-300 ease-in-out transform hover:-translate-y-1">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md mb-6 shadow-md transition-all duration-300 ease-in-out transform hover:-translate-y-1">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <p>{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <div class="bg-white rounded-2xl overflow-hidden shadow-xl transition-all duration-500 ease-in-out hover:shadow-2xl">
                <div class="relative">
                    <!-- Profile Header with Gradient Background -->
                    <div class="h-48 bg-gradient-to-r from-indigo-600 to-purple-600"></div>

                    <!-- Profile Picture Overlay -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2" style="top: 48px;">
                        <div class="relative">
                            <img src="{{ asset('images/profile/' . $profile->foto) }}"
                                class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-xl transition-all duration-300 hover:scale-105"
                                alt="Profile Photo">
                            <div class="absolute inset-0 rounded-full bg-black bg-opacity-0 transition-opacity duration-300 hover:bg-opacity-10"></div>
                        </div>
                    </div>
                </div>

                <!-- Profile Navigation -->
                <div class="bg-white px-8 pt-20 pb-6 text-center border-b border-gray-100">
                    <h1 class="text-2xl font-bold text-gray-800">{{ $profile->nama_lengkap }}</h1>
                    <p class="text-gray-600 mt-1">{{ Auth::user()->name }}</p>

                    <div class="flex justify-center space-x-4 mt-6">
                        <a href="{{ route('profile.edit', $profile->id) }}"
                           class="px-6 py-2 bg-indigo-600 text-white rounded-full text-sm font-medium transition-all duration-300 hover:bg-indigo-700 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                            Edit Profile
                        </a>
                        <a href="{{ route('password.edit') }}"
                           class="px-6 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium transition-all duration-300 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-opacity-50">
                            Change Password
                        </a>
                    </div>
                </div>

                <!-- Profile Details -->
                <div class="p-8">
                    <form action="{{ route('profile.store', $profile->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                            @foreach ([
                                'Nama Lengkap' => $profile->nama_lengkap,
                                'Nama User' => Auth::user()->name,
                                'Jenis Kelamin' => $profile->jk,
                                'Tanggal Lahir' => $profile->tgl,
                                'Agama' => $profile->agama,
                                'Alamat' => $profile->alamat
                            ] as $label => $value)
                                <div class="bg-gray-50 rounded-lg p-4 transition-all duration-300 hover:bg-gray-100">
                                    <span class="block text-sm font-medium text-gray-500 mb-1">{{ $label }}</span>
                                    <span class="block text-base font-semibold text-gray-800">{{ $value }}</span>
                                </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Articles Section -->
        <div class="max-w-6xl mx-auto">
            <div class="flex items-center mb-8">
                <div class="w-1 h-8 bg-green-600 rounded mr-3"></div>
                <h2 class="text-2xl font-bold text-gray-800">My Articles</h2>
            </div>

            @forelse ($artikel as $data)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6 transition-all duration-300 hover:shadow-xl transform hover:-translate-y-1">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/3 h-64 md:h-auto relative overflow-hidden">
                            <img src="{{ asset('images/artikel/' . $data->foto) }}"
                                 class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                                 alt="{{ $data->judul }}">
                            <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black to-transparent w-full h-20 md:hidden"></div>
                            <div class="absolute bottom-3 left-3 md:hidden">
                                <span class="inline-block bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ $data->kategori->nama_kategori }}
                                </span>
                            </div>
                        </div>
                        <div class="md:w-2/3 p-6 md:p-8 flex flex-col justify-between">
                            <div>
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="text-xl md:text-2xl font-bold text-gray-800 hover:text-indigo-600 transition-colors duration-300">
                                        {{ $data->judul }}
                                    </h3>
                                    <span class="hidden md:inline-block bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                        {{ $data->kategori->nama_kategori }}
                                    </span>
                                </div>

                                <div class="flex items-center text-gray-500 text-sm mb-4">
                                    <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>{{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y') }}</span>

                                    <div class="mx-2 h-1 w-1 rounded-full bg-gray-400"></div>

                                    <span class="capitalize px-2 py-1 rounded-md text-xs {{ $data->status == 'publish' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $data->status }}
                                    </span>
                                </div>

                                <p class="text-gray-600 mb-6 line-clamp-3">{{ Str::limit($data->deskripsi, 180) }}</p>
                            </div>

                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('artikel.show', $data->id) }}"
                                   class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg transition-colors duration-300 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Read More
                                </a>

                                @can('artikel-edit')
                                    <a href="{{ route('artikel.edit', $data->id) }}"
                                       class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg transition-colors duration-300 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </a>

                                    <form action="{{ route('artikel.destroy', $data->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');"
                                                class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg transition-colors duration-300 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-xl shadow p-8 text-center">
                    <svg class="h-16 w-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="text-gray-600 text-lg">You haven't created any articles yet.</p>
                    <a href="{{ route('artikel.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg transition-colors duration-300 hover:bg-indigo-700">
                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Create New Article
                    </a>
                </div>
            @endforelse

            <!-- Pagination -->
            <div class="mt-8">
                {!! $artikel->withQueryString()->links('pagination::tailwind') !!}
            </div>
        </div>
    </div>
@endsection
