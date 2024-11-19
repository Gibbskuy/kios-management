@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <div class="bg-gradient-to-r from-white to-blue-50 shadow-2xl rounded-2xl overflow-hidden max-w-4xl mx-auto transform">
        <div class="p-8">
             <a href="{{ route('/') }}"
                            class="bg-blue-500 text-white text-sm px-3 py-1 rounded hover:bg-blue-600">Kembali</a>
            <!-- Title and Meta Info -->
            <div class="text-center mb-8">
                <h1 class="text-5xl font-bold text-gray-800 leading-tight mb-4">{{ $content->judul }}</h1>
            </div>

            <!-- Image -->
            <div class="relative mb-8">
                <img src="{{ asset('images/content/' . $content->foto) }}" alt="{{ $content->judul }}" class="w-full h-96 object-cover rounded-lg shadow-md">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent opacity-50 rounded-lg"></div>
            </div>

            <!-- Description -->
            <div class="px-4 sm:px-8 lg:px-12 text-lg leading-relaxed text-gray-700">
                <p class="mb-6">{{ $content->deskripsi }}</p>
            </div>
             <div class="px-4 sm:px-8 lg:px-12 text-lg leading-relaxed text-gray-700">
                <p class="mb-6">{{ $content->alamat }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
