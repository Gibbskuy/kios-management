@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden max-w-4xl mx-auto">
        {{-- Header and Navigation --}}
        <div class="border-b border-gray-200 p-6">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 flex items-center font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Beranda
                </a>
                <div class="flex items-center">
                    <a href="{{ route('kategori.show', $artikel->kategori->id) }}" class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-medium hover:bg-gray-200 transition">
                        {{ $artikel->kategori->nama_kategori }}
                    </a>
                </div>
            </div>
        </div>

        {{-- Featured Image --}}
        <div class="relative">
            <img src="{{ asset('images/artikel/' . $artikel->foto) }}" alt="{{ $artikel->judul }}"
                class="w-full h-80 object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-50"></div>
        </div>

        {{-- Article Content --}}
        <div class="p-8">
            {{-- Article Metadata --}}
            <div class="mb-8 text-sm text-gray-500 flex items-center">
                <span>{{ date('d F Y', strtotime($artikel->tanggal)) }}</span>
                <span class="mx-2">•</span>
                <span>Oleh <span class="font-medium text-gray-800">{{ $artikel->user->name ?? 'Redaksi' }}</span></span>
            </div>

            {{-- Article Headline --}}
            <h1 class="text-3xl sm:text-4xl font-serif font-bold text-gray-900 leading-tight mb-6">
                {{ $artikel->judul }}
            </h1>

            {{-- Article Lead/Summary --}}
            <p class="text-xl text-gray-700 font-serif leading-relaxed mb-8 border-l-4 border-gray-800 pl-4 italic">
                {{ Str::limit(strip_tags($artikel->deskripsi), 200) }}
            </p>

            {{-- Article Body --}}
            <div class="prose prose-lg max-w-none font-serif text-gray-800 leading-relaxed">
                {!! $artikel->deskripsi !!}
            </div>

            {{-- Social Share --}}
            <div class="mt-12 pt-6 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-700">Bagikan artikel ini:</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-500 hover:text-blue-600">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-blue-800">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-blue-600">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Related Articles from Same Category --}}
            <div class="mt-12 pt-6 border-t border-gray-200">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-900">Artikel Terkait dalam "{{ $artikel->kategori->nama_kategori }}"</h3>
                    <a href="{{ route('kategori.show', $artikel->kategori->id) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                        Lihat Semua
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($artikel->kategori->artikels()->where('id', '!=', $artikel->id)->latest()->take(3)->get() as $relatedArticle)
                    <a href="{{ route('artikel.show', $relatedArticle->id) }}" class="group">
                        <div class="bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                            <div class="h-40 overflow-hidden">
                                <img src="{{ asset('images/artikel/' . $relatedArticle->foto) }}" alt="{{ $relatedArticle->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <div class="p-4">
                                <p class="text-sm text-gray-500 mb-1">{{ date('d M Y', strtotime($relatedArticle->tanggal)) }}</p>
                                <h4 class="font-medium text-gray-900 group-hover:text-blue-700 transition">{{ $relatedArticle->judul }}</h4>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Comments --}}
            <div class="mt-12 pt-8 border-t border-gray-200">
                <h3 class="text-xl font-bold text-gray-900 mb-6">Komentar</h3>
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
