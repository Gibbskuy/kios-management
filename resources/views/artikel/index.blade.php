@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        @can('admin-read')
            <!-- Article Approval Table Section -->
            <div class="mb-12 bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-green-600 to-green-500 text-white px-6 py-4">
                    <h2 class="text-xl font-semibold">Persetujuan Artikel</h2>
                </div>

                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-100 border-b-2 border-gray-200">
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Judul</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Kategori</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Status</th>
                                    <th class="px-6 py-3 text-center text-sm font-medium text-gray-700">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($artikelPending as $item)
                                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-150">
                                        <td class="px-6 py-4 text-sm text-gray-800">{{ $item->judul }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-600">{{ $item->tanggal }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-600">{{ $item->kategori->nama_kategori }}</td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="px-2 py-1 text-xs rounded-full
                                    @if ($item->status == 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($item->status == 'approved') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800 @endif">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center gap-2">
                                                <a href="{{ route('artikel.show', $item->id) }}"
                                                    class="text-blue-600 hover:text-blue-800" title="Lihat">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>
                                                <form action="{{ route('admin.artikel.approve', $item->id) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    <button type="submit" class="text-green-600 hover:text-green-800"
                                                        title="Setujui">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.artikel.reject', $item->id) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    <button type="submit" class="text-red-600 hover:text-red-800"
                                                        title="Tolak">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">Tidak ada artikel yang
                                            menunggu persetujuan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $artikelPending->links() }}
                    </div>
                </div>
            </div>
        @endcan

        <!-- Articles Section -->
        <div class="mb-12">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800">Daftar Artikel</h2>
                <div class="w-24 h-1 bg-green-500 mx-auto mt-2"></div>
                @can('artikel-create')
                    <div class="mt-4">
                        <a href="{{ route('artikel.create') }}"
                            class="inline-flex items-center px-4 py-2 bg-green-600 rounded-lg text-white hover:bg-green-700 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Tambah Artikel
                        </a>
                    </div>
                @endcan
            </div>

            @can('admin-read')
                <!-- Admin article management with tabs for different statuses -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
                    <div class="border-b border-gray-200">
                        <nav class="flex -mb-px">
                            <button id="tab-approved"
                                class="tab-btn text-green-600 border-green-500 font-medium px-6 py-4 text-sm border-b-2">
                                Approved
                            </button>
                            <button id="tab-rejected"
                                class="tab-btn text-gray-500 hover:text-gray-700 px-6 py-4 text-sm border-b-2 border-transparent">
                                Rejected
                            </button>
                        </nav>
                    </div>

                    <!-- Approved Articles Tab Content -->
                    <div id="content-approved" class="tab-content">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                            @forelse ($artikel as $data)
                                <div
                                    class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                    <div class="h-48 overflow-hidden">
                                        <img src="{{ asset('images/artikel/' . $data->foto) }}"
                                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                                    </div>
                                    <div class="p-5">
                                        <div class="flex justify-between items-center mb-3">
                                            <span class="px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full">
                                                {{ $data->kategori->nama_kategori }}
                                            </span>
                                            <span class="text-xs text-gray-500">{{ $data->tanggal }}</span>
                                        </div>
                                        <h3 class="font-bold text-lg text-gray-800 mb-2 line-clamp-2">{{ $data->judul }}</h3>
                                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                            {!! $data->deskripsi !!}
                                            <div class="flex justify-between items-center">
                                            <a href="{{ route('artikel.show', $data->slug) }}"
                                                class="text-blue-600 font-medium hover:text-blue-800 transition-colors flex items-center">
                                                Baca Selengkapnya
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                </svg>
                                            </a>
                                            @can('artikel-edit')
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('artikel.edit', $data->id) }}"
                                                        class="text-green-600 hover:text-green-800" title="Edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('artikel.destroy', $data->id) }}" method="POST"
                                                        class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800"
                                                            title="Hapus"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full text-center py-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mx-auto mb-4"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <p class="text-gray-500">Data artikel approved belum tersedia.</p>
                                </div>
                            @endforelse
                        </div>
                        <div class="px-6 py-4 border-t">
                            {{ $artikel->withQueryString()->links('pagination::tailwind') }}
                        </div>
                    </div>

                    <!-- Rejected Articles Tab Content -->
                    <div id="content-rejected" class="tab-content hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                            @forelse ($artikell as $data)
                                <div
                                    class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                    <div class="h-48 overflow-hidden">
                                        <img src="{{ asset('images/artikel/' . $data->foto) }}"
                                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                                    </div>
                                    <div class="p-5">
                                        <div class="flex justify-between items-center mb-3">
                                            <span class="px-3 py-1 bg-red-100 text-red-800 text-xs rounded-full">
                                                {{ $data->kategori->nama_kategori }}
                                            </span>
                                            <span class="text-xs text-gray-500">{{ $data->tanggal }}</span>
                                        </div>
                                        <h3 class="font-bold text-lg text-gray-800 mb-2 line-clamp-2">{{ $data->judul }}</h3>
                                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                            {!! $data->deskripsi !!}
                                            <div class="flex justify-between items-center">
                                            <a href="{{ route('artikel.show', $data->slug) }}"
                                                class="text-blue-600 font-medium hover:text-blue-800 transition-colors flex items-center">
                                                Baca Selengkapnya
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                </svg>
                                            </a>
                                            @can('artikel-edit')
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('artikel.edit', $data->id) }}"
                                                        class="text-green-600 hover:text-green-800" title="Edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('artikel.destroy', $data->id) }}" method="POST"
                                                        class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800"
                                                            title="Hapus"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full text-center py-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mx-auto mb-4"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <p class="text-gray-500">Data artikel rejected belum tersedia.</p>
                                </div>
                            @endforelse
                        </div>
                        <div class="px-6 py-4 border-t">
                            {{ $artikell->withQueryString()->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            @endcan
        </div>

        <!-- Latest Articles Section - Elegant Design -->
        <div class="relative bg-gradient-to-br from-green-600 to-green-800 rounded-3xl shadow-2xl overflow-hidden">
            <div class="absolute inset-0 bg-pattern opacity-10"></div>

            <div class="relative z-10 px-6 py-14 sm:px-10 lg:px-20">
                <div class="text-center mb-14">
                    <h2 class="text-4xl font-extrabold text-white mb-3">Artikel Terbaru</h2>
                    <div class="w-24 h-1 bg-white/40 mx-auto rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                    @forelse ($artikelall as $data)
                        <div class="group">
                            <div
                                class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition duration-500 hover:shadow-xl hover:-translate-y-1.5">
                                <div class="relative h-56 overflow-hidden">
                                    <img src="{{ asset('images/artikel/' . $data->foto) }}" alt="{{ $data->judul }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition duration-300">
                                    </div>
                                </div>

                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-3">
                                        <span
                                            class="text-xs px-3 py-1 bg-green-100 text-green-800 font-medium rounded-full">
                                            {{ $data->kategori->nama_kategori }}
                                        </span>
                                        <span class="text-xs text-gray-500">{{ $data->tanggal }}</span>
                                    </div>

                                    <h3
                                        class="text-lg font-semibold text-gray-800 mb-2 group-hover:text-green-600 transition-colors duration-300 line-clamp-2">
                                        {{ $data->judul }}
                                    </h3>

                                    {{-- @foreach ($artikelFiltered as $artikel)
                                        {{ $data->deskripsi }}
                                    @endforeach --}}


                                    <a href="{{ route('artikel.show', $data->slug) }}"
                                        class="inline-flex items-center text-green-700 font-medium hover:text-green-900 transition duration-300">
                                        <span>Baca Selengkapnya</span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 ml-1 transition-transform duration-300 group-hover:translate-x-1"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-20">
                            <div class="inline-block p-6 bg-white/10 backdrop-blur-md rounded-xl shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white/60 mx-auto mb-4"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p class="text-lg text-white/80">Belum ada artikel yang tersedia.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

    <script>
        // Tab functionality for admin articles
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => {
                        btn.classList.remove('text-green-600', 'border-green-500',
                            'font-medium');
                        btn.classList.add('text-gray-500', 'border-transparent');
                    });

                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                    });

                    // Add active class to clicked button
                    button.classList.remove('text-gray-500', 'border-transparent');
                    button.classList.add('text-green-600', 'border-green-500', 'font-medium');

                    // Show corresponding content
                    const contentId = 'content-' + button.id.split('-')[1];
                    document.getElementById(contentId).classList.remove('hidden');
                });
            });
        });
    </script>
@endsection
