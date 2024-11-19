@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <div class="bg-gradient-to-r from-white to-blue-50 shadow-2xl rounded-2xl overflow-hidden max-w-4xl mx-auto transform">
        <div class="p-8">
             <a href="{{ route('home') }}"
                            class="bg-blue-500 text-white text-sm px-3 py-1 rounded hover:bg-blue-600">Kembali</a>
            <div class="text-center mb-8">
                <h1 class="text-5xl font-bold text-gray-800 leading-tight mb-4">{{ $artikel->judul }}</h1>
                <p class="text-sm font-medium text-gray-500">
                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-lg mr-2">{{ $artikel->kategori->nama_kategori }}</span>
                    | <span class="ml-2">{{ $artikel->tanggal}}</span>
                </p>
            </div>

            <div class="relative mb-8">
                <img src="{{ asset('images/artikel/' . $artikel->foto) }}" alt="{{ $artikel->judul }}" class="w-full h-96 object-cover rounded-lg shadow-md">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-50 rounded-lg"></div>
            </div>

            <div class="px-4 sm:px-8 lg:px-12 text-lg leading-relaxed text-gray-700">
                <p class="mb-6">{{ $artikel->deskripsi }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
