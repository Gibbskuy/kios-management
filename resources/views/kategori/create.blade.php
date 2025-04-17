@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-16 mt-10 mb-20">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden transition-all duration-300">
                <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-6 py-4 border-b flex justify-between items-center">
                    <h4 class="text-xl font-semibold text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v7a2 2 0 01-2 2H6a2 2 0 01-2-2v-7m16 0H4" />
                        </svg>
                        {{ __('Tambah Kategori') }}
                    </h4>
                    <a href="{{ route('kategori.index') }}"
                        class="bg-indigo-500 text-white text-sm px-4 py-2 rounded-lg hover:bg-indigo-600 transition duration-200">
                        ← Kembali
                    </a>
                </div>

                <div class="p-6">
                    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-5">
                            <label for="nama_kategori" class="block text-gray-700 font-semibold mb-2">Nama Kategori</label>
                            <input type="text" id="nama_kategori"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('nama_kategori') border-red-500 @enderror"
                                name="nama_kategori" value="{{ old('nama_kategori') }}" placeholder="Contoh: Teknologi">

                            @error('nama_kategori')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-purple-600 hover:bg-purple-700 text-white font-semibold text-sm px-5 py-2 rounded-lg transition duration-200">
                                Simpan Kategori
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
