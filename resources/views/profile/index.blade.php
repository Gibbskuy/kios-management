@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-10 px-4">
        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-6 justify-between">
                        <div class="flex justify-between items-center">
                            <h2 class="font-bold text-xl">Profile</h2>
                            <h2 class="font-bold text-xl"><a href="{{ route('password.edit') }}">Password</a></h2>
                        </div>
                    </div>

                    <div class="p-8">
                        <div class="text-center">
                            <form action="{{ route('profile.store', $profile->id) }}" method="POST"
                                enctype="multipart/form-data">

                                <div class="flex justify-center mb-8">
                                    <img src="{{ asset('images/profile/' . $profile->foto) }}"
                                        class="w-48 h-48 object-cover rounded-full shadow-lg border-4 border-indigo-500"
                                        alt="profile">
                                </div>

                                <div class="space-y-6 mt-10">
                                    <div class="grid grid-cols-2">
                                        <span class="block text-black font-semibold">Nama Lengkap:</span>
                                        <span class="block font-bold text-indigo-500">{{ $profile->nama_lengkap }}</span>
                                    </div>
                                    <hr class="border-gray-300">


                                    <div class="grid grid-cols-2">
                                        <span class="block text-black font-semibold">Nama User:</span>
                                        <span class="block font-bold text-indigo-500">{{ Auth::user()->name }}</span>
                                    </div>
                                    <hr class="border-gray-300">

                                    <div class="grid grid-cols-2">
                                        <span class="block text-black font-semibold">Jenis Kelamin:</span>
                                        <span class="block font-bold text-indigo-500">{{ $profile->jk }}</span>
                                    </div>
                                    <hr class="border-gray-300">

                                    <div class="grid grid-cols-2">
                                        <span class="block text-black font-semibold">Tanggal Lahir:</span>
                                        <span class="block font-bold text-indigo-500">{{ $profile->tgl }}</span>
                                    </div>
                                    <hr class="border-gray-300">

                                    <div class="grid grid-cols-2">
                                        <span class="block text-black font-semibold">Agama:</span>
                                        <span class="block font-bold text-indigo-500">{{ $profile->agama }}</span>
                                    </div>
                                    <hr class="border-gray-300">

                                    <div class="grid grid-cols-2">
                                        <span class="block text-black font-semibold">Alamat:</span>
                                        <span class="block font-bold text-indigo-500">{{ $profile->alamat }}</span>
                                    </div>
                                </div>

                                <div class="mt-8 text-center">
                                    <form action="{{ route('profile.destroy', $profile->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('profile.edit', $profile->id) }}"
                                            class="inline-block bg-indigo-500 text-white px-6 py-2 rounded-full shadow-lg transition hover:bg-black">
                                            Edit
                                        </a>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="px-6">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-5">
            <div class="bg-green-600 text-white px-6 py-4 flex justify-between items-center">
                <h2 class="text-lg font-semibold">Artikel Yang Telah dibuat OLeh {{ Auth::user()->name }}</h2>
            </div>

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
                                <span class="font-bold">{{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y') }}</span>
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
                    <div class="text-center">Data artikel belum tersedia.</div>
                @endforelse
            </div>

            <div class="px-5 py-5">
                {!! $artikel->withQueryString()->links('pagination::tailwind') !!}
            </div>
        </div>
    </div>
@endsection
