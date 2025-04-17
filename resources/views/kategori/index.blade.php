<!-- kategori/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-gray-50 to-gray-100 min-h-screen">
    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Kategori Artikel</h1>
            <div class="w-24 h-1 bg-blue-600 mx-auto mb-4"></div>
            <p class="text-gray-600 text-lg">Temukan artikel berdasarkan kategori yang Anda minati</p>
        </div>

        @canany(['kategori-create', 'artikel-create'])
        <div class="mb-10 bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-blue-600 px-6 py-4 flex justify-between items-center cursor-pointer" id="adminPanelToggle">
                <h2 class="text-xl font-semibold text-white">Panel Admin</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="adminPanelArrow">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>

            <div class="p-6 hidden" id="adminPanelContent">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @can('admin-read')
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Manajemen Kategori</h3>
                        <div class="space-y-4">
                            <a href="{{ route('kategori.create') }}" class="flex items-center justify-center bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah Kategori Baru
                            </a>
                        </div>
                    </div>
                    @endcan

                    @can('artikel-create')
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Manajemen Artikel</h3>
                        <div class="space-y-4">
                            <a href="{{ route('artikel.create') }}" class="flex items-center justify-center bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah Artikel Baru
                            </a>
                        </div>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
        @endcanany

        <div class="mb-16">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                Semua Kategori
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($kategori as $data)
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <div class="p-6">
                        <div class="h-16 flex items-center justify-center mb-4">
                            <h3 class="text-xl font-semibold text-gray-800 text-center">{{ $data->nama_kategori }}</h3>
                        </div>

                        <div class="flex flex-col space-y-2">
                            <a href="{{ route('kategori.filter', $data->nama_kategori) }}" class="bg-blue-600 text-white text-center py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                                Lihat Artikel
                            </a>

                            <div class="flex space-x-2 mt-2">
                                @can('kategori-edit')
                                <a href="{{ route('kategori.edit', $data->id) }}" class="flex-1 border border-blue-500 text-blue-500 text-center py-1.5 rounded-lg hover:bg-blue-500 hover:text-white transition">
                                    Edit
                                </a>
                                @endcan

                                @can('kategori-delete')
                                <form action="{{ route('kategori.destroy', $data->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full border border-red-500 text-red-500 py-1.5 rounded-lg hover:bg-red-500 hover:text-white transition">
                                        Hapus
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full bg-white rounded-xl p-10 text-center shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <p class="text-gray-500 text-lg">Belum ada kategori tersedia.</p>
                    @can('kategori-create')
                    <a href="{{ route('kategori.create') }}" class="mt-4 inline-block bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition">
                        Tambah Kategori Pertama
                    </a>
                    @endcan
                </div>
                @endforelse
            </div>
        </div>

        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                Artikel Terbaru
            </h2>

            <div class="space-y-6">
                @forelse ($artikel as $data)
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/3 h-64 md:h-auto overflow-hidden">
                            <img src="{{ asset('images/artikel/' . $data->foto) }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105" alt="{{ $data->judul }}">
                        </div>

                        <div class="md:w-2/3 p-6">
                            <div class="flex items-center mb-3">
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">{{ $data->kategori->nama_kategori }}</span>
                                <span class="mx-2 text-gray-400">•</span>
                                <span class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y') }}</span>
                                <span class="mx-2 text-gray-400">•</span>
                                <span class="text-sm font-medium {{ $data->status == 'published' ? 'text-green-600' : 'text-yellow-600' }}">
                                    {{ ucfirst($data->status) }}
                                </span>
                            </div>

                            <h3 class="text-2xl font-bold text-gray-800 mb-3 hover:text-blue-600 transition">{{ $data->judul }}</h3>
                            <p class="text-gray-600 mb-6">{!! $data->deskripsi!!}</p>

                            <div class="flex flex-wrap gap-2 mt-5">
                                <a href="{{ route('artikel.show', $data->slug) }}" class="bg-blue-600 text-white py-2 px-5 rounded-lg hover:bg-blue-700 transition flex items-center">
                                    <span>Baca Selengkapnya</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>

                                @can('artikel-edit')
                                <a href="{{ route('artikel.edit', $data->id) }}" class="bg-green-600 text-white py-2 px-5 rounded-lg hover:bg-green-700 transition">
                                    Edit
                                </a>

                                <form action="{{ route('artikel.destroy', $data->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white py-2 px-5 rounded-lg hover:bg-red-700 transition"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                        Hapus
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="bg-white rounded-xl p-10 text-center shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-gray-500 text-lg">Belum ada artikel tersedia.</p>
                    @can('artikel-create')
                    <a href="{{ route('artikel.create') }}" class="mt-4 inline-block bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition">
                        Tambah Artikel Pertama
                    </a>
                    @endcan
                </div>
                @endforelse
            </div>
        </div>

        {{-- <div class="mt-8">
            {{ $kategori->links('pagination::tailwind') }}
            {{ $artikel->links('pagination::tailwind') }}
        </div> --}}
    </div>
</div>

<script>
    // Admin Panel Toggle
    document.addEventListener('DOMContentLoaded', function() {
        const toggle = document.getElementById('adminPanelToggle');
        const content = document.getElementById('adminPanelContent');
        const arrow = document.getElementById('adminPanelArrow');

        if (toggle && content && arrow) {
            toggle.addEventListener('click', function() {
                content.classList.toggle('hidden');
                arrow.classList.toggle('rotate-180');
            });
        }
    });
</script>
@endsection
