@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <div class="flex justify-center">
        <div class="w-full md:w-2/3 lg:w-1/2">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-green-700 px-6 py-3 border-b flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-white">Edit Kategori</h2>
                    <a href="{{ route('kategori.index') }}" class="bg-blue-500 text-white text-sm px-3 py-1 rounded hover:bg-blue-600">Kembali</a>
                </div>
                <div class="p-6">
                    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Nama Kategori</label>
                            <input type="text" class="w-full px-3 py-2 border rounded @error('nama_kategori') border-red-500 @enderror" name="nama_kategori" value="{{$kategori->nama_kategori}}" placeholder="Kategori" required>
                            @error('nama_kategori')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                            <textarea class="w-full px-3 py-2 border rounded @error('deskripsi') border-red-500 @enderror" name="deskripsi" rows="3" placeholder="Deskripsi" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-green-500 text-white text-sm px-4 py-2 rounded hover:bg-green-600">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
