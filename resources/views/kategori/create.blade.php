@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10 mb-44">
        <div class="flex justify-center">
            <div class="w-full md:w-2/3 lg:w-1/2">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-green-700 px-4 py-3 border-b flex justify-between items-center">
                        <h4 class="text-lg font-semibold text-white">{{ __('kategori') }}</h4>
                        <a href="{{ route('kategori.index') }}"
                            class="bg-blue-500 text-white text-sm px-3 py-1 rounded hover:bg-blue-600">Kembali</a>
                    </div>

                    <div class="p-6">
                        @can('kategori-create')
                            <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                            @endcan
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-700 font-bold mb-2">Nama Kategori</label>
                                <input type="text"
                                    class="w-full px-3 py-2 border rounded @error('nama_kategori') border-red-500 @enderror"
                                    name="nama_kategori" value="{{ old('nama_kategori') }}" placeholder="Nama">
                                @error('nama_kategori')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>


                            {{-- <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Image</label>
                            <input type="file" class="w-full px-3 py-2 border rounded @error('image') border-red-500 @enderror" name="image" value="{{ old('image') }}">
                            @error('image')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div> --}}

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="bg-green-500 text-white text-sm px-4 py-2 rounded hover:bg-green-600">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
