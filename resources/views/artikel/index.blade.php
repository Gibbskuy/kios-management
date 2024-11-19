@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-12 content-center mt-5">
        @can('admin-read')
            <div class=" bg-white rounded-lg shadow-lg p-8 mb-10">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Persetujuan Artikel</h2>
                <table class="w-full border-collapse bg-gray-100 rounded-lg overflow-hidden">
                    <thead class="bg-green-500 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left">Judul</th>
                            <th class="px-6 py-3 text-left">Status</th>
                            @can('admin-read')
                                <th class="px-6 py-3 text-center">Aksi</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artikelPending as $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                                <td class="px-6 py-4">{{ $item->judul }}</td>
                                <td class="px-6 py-4">{{ ucfirst($item->status) }}</td>
                                <td class="px-6 py-4 text-center">
                                    <form action="{{ route('admin.artikel.approve', $item->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition mb-2">Setujui</button>
                                    </form>
                                    <form action="{{ route('admin.artikel.reject', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">Tolak</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $artikelPending->links() }}
                </div>
            </div>
        @endcan

        <div class="flex flex-col md:flex-row gap-8 ">
            <div class="{{ Auth::user()->can('admin-read') ? 'md:w-1/2' : 'md:w-full' }}">
                {{-- <div class="md:w-1/2"> --}}
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="bg-green-600 text-white px-6 py-4 flex justify-between items-center">
                        <h2 class="text-lg font-semibold">Artikel</h2>
                        @can('artikel-create')
                            <a href="{{ route('artikel.create') }}"
                                class="text-sm bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-700 transition">Tambah
                                Artikel</a>
                        @endcan
                    </div>

                    <div class="p-6 space-y-6">
                        @forelse ($artikel as $data)
                            <div
                                class="flex flex-col sm:flex-row bg-gray-100 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                <!-- Thumbnail -->
                                <div class="sm:w-1/3 w-full">
                                    <img src="{{ asset('images/artikel/' . $data->foto) }}"
                                        class="w-full h-full object-cover">
                                </div>
                                <!-- Content -->
                                <div class="p-6 flex flex-col sm:w-2/3 w-full">
                                    <h3 class="font-semibold text-2xl text-gray-800 mb-2">{{ $data->judul }}</h3>
                                    <p class="text-gray-600 mb-4">{{ Str::limit($data->deskripsi, 150) }}</p>
                                    <p class="text-gray-500 text-sm">Kategori: <span class="font-bold">
                                            {{ $data->kategori->nama_kategori }}</span> |
                                        <span class="font-bold">{{ $data->tanggal }}</span>
                                    </p>
                                    <p class="py-2 font-bold ">{{ ucfirst($data->status) }}</p>
                                    <div class="mt-4 flex items-center space-x-4">
                                        <a href="{{ route('artikel.show', $data->id) }}"
                                            class="text-sm bg-blue-600 text-white px-3 py-2 rounded-lg hover:bg-blue-700 transition">Lihat
                                            Selengkapnya</a>
                                        @can('artikel-edit')
                                            <a href="{{ route('artikel.edit', $data->id) }}"
                                                class="text-sm bg-green-600 text-white px-3 py-2 rounded-lg hover:bg-green-800 transition">Edit</a>
                                            <form action="{{ route('artikel.destroy', $data->id) }}" method="POST"
                                                class="inline">
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
                    <div class="px-5 py-5">
                        {!! $artikel->withQueryString()->links('pagination::tailwind') !!}
                    </div>
                </div>
            </div>

            @can('admin-read')
                <div class="md:w-1/2">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="bg-green-600 text-white px-6 py-4 flex justify-between items-center">
                            <h2 class="text-lg font-semibold">Artikel Reject</h2>
                            @can('artikel-create')
                                <a href="{{ route('artikel.create') }}"
                                    class="text-sm bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-700 transition">Tambah
                                    Artikel</a>
                            @endcan
                        </div>

                        <div class="p-6 space-y-6">
                            @forelse ($artikell as $data)
                                <div
                                    class="flex flex-col sm:flex-row bg-gray-100 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                    <!-- Thumbnail -->
                                    <div class="sm:w-1/3 w-full">
                                        <img src="{{ asset('images/artikel/' . $data->foto) }}"
                                            class="w-full h-full object-cover">
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
                                                <form action="{{ route('artikel.destroy', $data->id) }}" method="POST"
                                                    class="inline">
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

                        <div class=" px-5 py-5">
                            {!! $artikel->withQueryString()->links('pagination::tailwind') !!}
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>

@endsection
