@extends('layouts.app')

@section('content')
    <section>
        <div class="relative">
            <div class="absolute inset-0">
                <img src="/web-1608427_1280.webp" alt="Background" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black opacity-30"></div>
            </div>
            <div class="relative container mx-auto text-center text-white py-40">
                <h1 class="text-4xl md:text-6xl font-bold">Selamat Datang di <span class="text-slate-950">KiosArtikelZ</span>
                </h1>
                <p class="mt-4 text-lg md:text-xl">With operations as local as yours, we know it’s hard to get the big
                    picture. Here are a few insights that put our purpose in context. Available in multiple languages.</p>
            </div>
        </div>
    </section>

    <main>
        <div class="container mx-auto">
            <section class="py-24">
                @forelse ($content as $data)
                    <div class="bg-gray-100 flex flex-col md:flex-row items-center rounded overflow-hidden">
                        <div class="w-full h-full md:w-1/2">
                            <img src="{{ asset('images/content/' . $data->foto) }}"
                                class="w-11/12 rounded-md shadow-md object-cover">
                        </div>

                        <div class="w-full md:w-1/2 md:pl-8 mt-6 md:mt-0">
                            <h1 class="text-4xl font-bold text-gray-800">
                                <span class="text-black">{{ $data->judul }}</span>
                            </h1>
                            <p class="mt-4 text-gray-600 leading-relaxed">
                                {{ $data->deskripsi }}
                            </p>
                            <p class="mt-4 text-gray-600 leading-relaxed">
                                Alamat : {{ $data->alamat }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500">
                        Data Content belum tersedia.
                    </div>
                @endforelse
            </section>
        </div>

            <section class="w-full bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 py-12">
                <div class="container mx-auto py-2">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($artikel as $data)
                            <div
                                class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-transform duration-300 transform hover:scale-105">
                                <img src="{{ asset('images/artikel/' . $data->foto) }}" alt="{{ $data->judul }}"
                                    class="w-full h-60 object-cover transition-transform duration-300 transform hover:scale-110">

                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $data->judul }}</h3>

                                    <div class="flex items-center text-sm text-gray-500 mb-4 space-x-4">
                                        <span class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500 mr-1"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M8 2a6 6 0 016 6v6.08a5.98 5.98 0 01-3.07 5.19l-.93.58a.75.75 0 11-.78-1.3l.93-.58A4.48 4.48 0 0014 14.08V8a4 4 0 10-8 0v6.08c0 1.07.35 2.05.93 2.86l.93.58a.75.75 0 11-.78 1.3l-.93-.58A5.98 5.98 0 014 14.08V8a6 6 0 016-6z" />
                                            </svg>
                                            {{ $data->kategori->nama_kategori }}
                                        </span>
                                        <span class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-1"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M6 2a2 2 0 012-2h4a2 2 0 012 2v4h2.5a.5.5 0 01.5.5v2a.5.5 0 01-.5.5H14v2h1.5a.5.5 0 01.5.5v2a.5.5 0 01-.5.5H14v2a2 2 0 01-2 2H8a2 2 0 01-2-2v-2H4.5a.5.5 0 01-.5-.5v-2a.5.5 0 01.5-.5H6v-2H4.5a.5.5 0 01-.5-.5v-2a.5.5 0 01.5-.5H6V2zM8 0h4a4 4 0 014 4v2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2v2a4 4 0 01-4 4H8a4 4 0 01-4-4v-2H2a2 2 0 01-2-2v-2a2 2 0 012-2h2V4a4 4 0 014-4z" />
                                            </svg>
                                            {{ $data->tanggal }}
                                        </span>
                                    </div>

                                    <!-- Read More -->
                                    <a href="{{ route('artikel.show', $data->id) }}"
                                        class="text-blue-600 font-semibold hover:underline">
                                        Baca Selengkapnya →
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center text-gray-500">
                                Data Artikel belum tersedia.
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>
    </main>
@endsection
