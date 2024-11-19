@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-gray-800 text-white px-6 py-3">
                    <div class="flex justify-between items-center">
                        <h4 class="font-semibold text-lg">{{ __('content') }}</h4>
                        <a href="{{ route('content.index') }}" class="border border-white text-white hover:bg-blue-700 py-1 px-3 rounded text-sm">Kembali</a>
                    </div>
                </div>
                <div class="p-6">
                    <form action="{{ route('content.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
                            <input type="text" name="judul" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('judul') border-red-500 @enderror" value="{{ $content->judul }}" placeholder="Barang" required>
                            @error('judul')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                            <textarea name="deskripsi" rows="2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('deskripsi') border-red-500 @enderror" placeholder="Deskripsi" required>{{ $content->deskripsi }}</textarea>
                            @error('deskripsi')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
                            <textarea name="alamat" rows="2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('alamat') border-red-500 @enderror" placeholder="alamat" required>{{ $content->alamat }}</textarea>
                            @error('alamat')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Foto</label>
                            @if($content->foto)
                            <p><img src="{{ asset('images/content/' . $content->foto) }}" alt="foto" class="w-48"></p>
                            @endif
                            <input type="file" name="foto" class="block w-full text-sm mt-4 text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 @error('foto') border-red-500 @enderror">
                            @error('foto')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
