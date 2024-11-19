@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-12 mt-5">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Content List</h1>
        </div>

        <div class="flex justify-center mb-6">
            {{-- @can('content-create')
                <a href="{{ route('content.create') }}"
                    class="text-sm bg-blue-500 text-white hover:bg-blue-700 rounded-lg transition px-6 py-2">Tambah Content</a>
            @endcan --}}
        </div>

        <div class="container mx-auto px-4 py-8">
            <!-- Content Section -->
            <div class="flex flex-col md:flex-row bg-white shadow-lg rounded-lg overflow-hidden">
                @forelse ($content as $data)

                    <!-- Image Section -->
                    <div class="md:w-1/2">
                        <img src="{{ asset('images/content/' . $data->foto) }}" alt="{{ $data->judul }}" class="object-cover w-full h-full">
                    </div>

                    <!-- Content Section -->
                    <div class="md:w-1/2 p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $data->judul }}</h2>
                        <p class="text-sm text-gray-500 mb-4">{{ Str::limit($data->alamat, 50) }}</p>

                        <p class="text-sm text-gray-600 mb-6">
                           {{ Str::limit($data->deskripsi, 300) }}
                        </p>
                        <!-- Button -->
                        <div class="mt-4 flex space-x-2">
                            <a href="{{ route('content.show', $data->id) }}"
                                class="text-sm bg-blue-600 text-white px-3 py-2 rounded-lg hover:bg-blue-700 transition">Lihat
                                Selengkapnya</a>
                            @can('content-edit')
                                <a href="{{ route('content.edit', $data->id) }}"
                                    class="text-sm bg-green-600 text-white px-3 py-2 rounded-lg hover:bg-green-800 transition">Edit</a>
                            @endcan
                            @can('content-delete')
                                <form action="{{ route('content.destroy', $data->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-sm bg-red-600 text-white px-3 py-2 rounded-lg hover:bg-red-800 transition"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus content ini?');">Hapus</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                      @empty
                <div class="col-span-full text-center text-gray-500">Data content belum tersedia.</div>
            @endforelse
            </div>
        </div>
    </div>
@endsection
