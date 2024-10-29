@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-10 px-4">
        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                  @if (session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-6 justify-between">
                        <div class="flex justify-between items-center">
                            <h2 class="font-bold text-xl">Profile</h2>
                            <h2 class="font-bold text-xl"><a href="{{route('password.edit')}}">Password</a></h2>
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
                                        <span class="block text-black font-semibold"><a href="{{ route('hobi.index') }}">Hobi:</a></span>
                                        <span class="block font-bold text-indigo-500">{{ $profile->id_hobi }}
                                            <ol class="block font-bold text-indigo-500">
                                                @foreach ($hobi as $item)
                                                    <li>
                                                        {{ $item->hobi }}
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </span>
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
@endsection
