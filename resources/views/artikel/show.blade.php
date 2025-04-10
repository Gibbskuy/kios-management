@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden max-w-4xl mx-auto animate-fade-in">
            <div class="p-8">
                {{-- Tombol Kembali --}}
                <div class="flex justify-between items-center mb-6">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 transform hover:scale-105">
                        ⬅️ Kembali
                    </a>
                </div>

                {{-- Judul Artikel --}}
                <div class="text-center mb-10">
                    <h1 class="text-4xl font-extrabold text-gray-900 leading-tight mb-3">
                        📖 {{ $artikel->judul }}
                    </h1>
                    <div class="flex justify-center items-center text-sm text-gray-600">
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full mr-2">
                            🏷️ {{ $artikel->kategori->nama_kategori }}
                        </span>
                        <span class="text-gray-500">|</span>
                        <span class="ml-2 text-gray-700">📅 {{ $artikel->tanggal }}</span>
                    </div>
                    <p class="text-gray-600 text-sm mt-2">
                        ✍️ Ditulis oleh: <strong>{{ $artikel->user->name ?? 'Anonim' }}</strong>
                    </p>
                </div>

                {{-- Gambar Artikel --}}
                <div class="relative mb-10">
                    <img src="{{ asset('images/artikel/' . $artikel->foto) }}" alt="{{ $artikel->judul }}"
                        class="w-full h-96 object-cover rounded-2xl shadow-lg transition duration-300 transform hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-40 rounded-2xl"></div>
                </div>

                <div class="prose prose-lg mx-auto text-gray-800">
                    {!! $artikel->deskripsi !!}

                </div>

                {{-- List Pembaca
                <div class="mt-8 bg-gray-100 p-4 rounded-xl shadow-md">
                    <h3 class="text-lg font-semibold text-gray-800">👀 Telah Dibaca Oleh:</h3>
                    <ul class="list-disc list-inside text-gray-600 mt-2">
                        @foreach ($artikel->read_by as $user_id)
                            <li class="transition duration-300 hover:text-blue-600">
                                👤 {{ \App\Models\User::find($user_id)?->name ?? 'User Tidak Diketahui' }}
                            </li>
                        @endforeach
                    </ul>
                </div> --}}

                {{-- Disqus Komentar --}}
                <div class="mt-12">
                    <div id="disqus_thread"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        (function() {
            var d = document,
                s = d.createElement('script');
            s.src = 'https://YOUR_DISQUS_SHORTNAME.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the
        <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
    </noscript>
@endpush
