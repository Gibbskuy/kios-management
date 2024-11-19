<!-- kategori/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-12 mt-5">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Kategori Artikel</h2>
            <p class="text-gray-600">Pilih kategori produk yang tersedia</p>
        </div>

        <div class="flex justify-center mb-6">
            @can('kategori-create')
                <a href="{{ route('kategori.create') }}"
                    class="text-sm bg-blue-500 text-white hover:bg-blue-700 rounded-lg transition px-6 py-2">Tambah Kategori</a>
            @endcan
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($kategori as $data)
                <div class="bg-white shadow-lg rounded-xl p-6 transition transform hover:scale-105">
                    <br>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2 text-center">{{ $data->nama_kategori }}</h3>

                    <div class="flex space-x-4 justify-around">
                        <a href="{{ route('kategori.filter', $data->id) }}"
                            class="text-sm bg-blue-500 text-white px-3 py-1 rounded-sm hover:bg-blue-700">
                            Pilih
                        </a>
                        @can('kategori-edit')
                            <a href="{{ route('kategori.edit', $data->id) }}"
                                class="text-sm border border-green-500 text-green-500 hover:text-white hover:bg-green-500 px-3 py-1 rounded-lg transition">Edit</a>
                        @endcan
                        @can('kategori-delete')
                            <form action="{{ route('kategori.destroy', $data->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-sm border border-red-500 text-red-500 hover:text-white hover:bg-red-500 px-3 py-1 rounded-lg transition">
                                    Hapus
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500">
                    Data kategori belum tersedia.
                </div>
            @endforelse
        </div>

        <div class="md:w-full mt-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 space-y-6">
                    @forelse ($artikel as $data)
                        <div
                            class="flex flex-col sm:flex-row bg-gray-100 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <!-- Thumbnail -->
                            <div class="sm:w-1/3 w-full">
                                <img src="{{ asset('images/artikel/' . $data->foto) }}" class="w-full h-full object-cover">
                            </div>
                            <!-- Content -->
                            <div class="p-6 flex flex-col sm:w-2/3 w-full">
                                <h3 class="font-semibold text-2xl text-gray-800 mb-2">{{ $data->judul }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($data->deskripsi, 150) }}</p>
                                <p class="text-gray-500 text-sm">Kategori: <span class="font-bold">
                                        {{ $data->kategori->nama_kategori }}</span> |
                                    <span
                                        class="font-bold">{{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y') }}</span>
                                </p>
                                <p class="py-2 font-bold ">{{ ucfirst($data->status) }}</p>
                                <div class="mt-4 flex items-center space-x-4">
                                    <a href="{{ route('artikel.show', $data->id) }}"
                                        class="text-sm bg-blue-600 text-white px-3 py-2 rounded-lg hover:bg-blue-700 transition">Lihat
                                        Selengkapnya</a>
                                    @can('artikel-edit')
                                        <a href="{{ route('artikel.edit', $data->id) }}"
                                            class="text-sm bg-green-600 text-white px-3 py-2 rounded-lg hover:bg-green-800 transition">Edit</a>
                                        <form action="{{ route('artikel.destroy', $data->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-sm bg-red-600 text-white px-3 py-2 rounded-lg hover:bg-red-800 transition"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">Hapus</button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-gray-500">Data artikel belum tersedia.</div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="mt-6">
            {{-- {{ $kategori->links('pagination::tailwind') }} --}}
            {{-- {{ $artikel->links('pagination::tailwind') }} --}}
        </div>
    </div>
@endsection
