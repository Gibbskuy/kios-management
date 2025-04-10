@extends('layouts.app')

@section('content')
    <!-- Hero Section with Parallax Effect -->
    <section class="relative h-screen overflow-hidden">
        <div class="absolute inset-0 transform transition-transform duration-1000 ease-in-out hover:scale-105">
            <img src="/web-1608427_1280.webp" alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-900/70 to-purple-900/70"></div>
        </div>
        <div class="relative h-full flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8">
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-4 animate-fade-in-down">
                Selamat Datang di
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 via-pink-500 to-purple-500">
                    KiosArtikelZ
                </span>
            </h1>
            <p class="mt-6 text-xl md:text-2xl text-gray-200 max-w-3xl text-center leading-relaxed animate-fade-in-up">
                With operations as local as yours, we know it's hard to get the big picture.
                Here are a few insights that put our purpose in context. Available in multiple languages.
            </p>
            <div class="mt-10 animate-bounce-slow">
                <a href="#content" class="inline-flex items-center justify-center p-4 rounded-full bg-white/10 backdrop-blur-sm hover:bg-white/20 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <main>
        <!-- Featured Content Section -->
        <section id="content" class="py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-gray-50 to-gray-100">
            <div class="container mx-auto">
                <h2 class="text-4xl font-bold text-center mb-12 relative">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">
                        Featured Content
                    </span>
                    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-32 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mt-2"></div>
                </h2>

                <!-- Content Carousel dengan Scroll Horizontal -->
                <div class="relative overflow-hidden">
                    <!-- Tombol Navigasi -->
                    <button id="prevButton" class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-white/80 hover:bg-white text-purple-600 p-3 rounded-r-lg shadow-lg transition-all duration-300 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <button id="nextButton" class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-white/80 hover:bg-white text-purple-600 p-3 rounded-l-lg shadow-lg transition-all duration-300 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <!-- Container untuk Item yang Bisa di-Scroll -->
                    <div class="content-carousel overflow-x-auto pb-8 hide-scrollbar">
                        <div class="flex space-x-6 px-4 snap-x snap-mandatory">
                            @forelse ($content as $data)
                                <div class="snap-center flex-shrink-0 w-full md:w-[calc(100%-2rem)] lg:w-[calc(80%-2rem)] xl:w-[calc(70%-2rem)]">
                                    <div class="group relative bg-white rounded-xl shadow-xl overflow-hidden transform transition-all duration-500 hover:scale-[1.02] hover:shadow-2xl border border-gray-100">
                                        <!-- Background Image -->
                                        <div class="h-64 lg:h-80 w-full bg-cover bg-center relative" style="background-image: url('{{ asset('images/content/' . $data->foto) }}');">
                                            <!-- Overlay -->
                                            <div class="absolute inset-0 bg-black/50"></div>

                                            <!-- Judul di Tengah -->
                                            <div class="absolute inset-0 flex items-center justify-center text-white text-center p-6">
                                                <h1 class="text-3xl font-bold">{{ $data->judul }}</h1>
                                            </div>
                                        </div>

                                        <!-- Konten Deskripsi -->
                                        <div class="p-6">
                                            <p class="text-lg text-gray-600 leading-relaxed mb-4">
                                                {{ Str::limit($data->deskripsi, 150) }}
                                            </p>
                                            <div class="flex items-center space-x-2 text-gray-700 mb-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                <span>{{ $data->alamat }}</span>
                                            </div>
                                            <!-- Tombol Read More -->
                                            <a href="#" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium rounded-lg transition-transform duration-300 hover:translate-x-1 self-start">
                                                Baca Selengkapnya
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="w-full text-center py-12 bg-white rounded-xl shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
                                    </svg>
                                    <p class="text-xl text-gray-500">Data Content belum tersedia.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Dots pagination -->
                    <div class="flex justify-center space-x-2 mt-6">
                        <!-- Dots akan dihasilkan dengan JavaScript -->
                    </div>
                </div>
            </div>
        </section>


        <section class="py-20 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 animate-gradient-x"></div>
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10">
                <div class="absolute -top-40 -left-40 w-80 h-80 bg-white rounded-full"></div>
                <div class="absolute top-20 right-20 w-40 h-40 bg-white rounded-full"></div>
                <div class="absolute bottom-40 right-60 w-60 h-60 bg-white rounded-full"></div>
                <div class="absolute bottom-10 left-40 w-30 h-30 bg-white rounded-full"></div>
            </div>

            <div class="container mx-auto relative z-10 px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-white mb-4">Artikel Terbaru</h2>
                    <div class="w-24 h-1 bg-white/30 mx-auto"></div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($artikel as $data)
                        <div class="group perspective">
                            <div class="relative h-full bg-white rounded-2xl shadow-xl overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:rotate-y-5">
                                <div class="overflow-hidden h-64">
                                    <img src="{{ asset('images/artikel/' . $data->foto) }}" alt="{{ $data->judul }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                </div>

                                <div class="p-8">
                                    <h3 class="text-xl font-bold text-gray-800 mb-4 group-hover:text-blue-600 transition-colors duration-300">
                                        {{ $data->judul }}
                                    </h3>

                                    <div class="flex items-center text-sm text-gray-500 mb-6 space-x-4">
                                        <span class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600 mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                            </svg>
                                            {{ $data->kategori->nama_kategori }}
                                        </span>
                                        <span class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600 mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{ $data->tanggal }}
                                        </span>
                                    </div>

                                    <a href="{{ route('artikel.show', $data->id) }}"
                                        class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition-all duration-300 group">
                                        <span>Baca Selengkapnya</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-16">
                            <div class="inline-block p-6 bg-white/20 backdrop-blur-sm rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white/70 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p class="text-xl text-white">Data Artikel belum tersedia.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="py-20 bg-gray-900 text-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-8">Ingin Membaca Lebih Banyak Artikel?</h2>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto mb-10">Jelajahi koleksi artikel kami yang beragam dan temukan wawasan baru setiap hari.</p>
                <a href="#" class="inline-block px-8 py-4 text-lg font-semibold rounded-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 transform transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                    Jelajahi Semua Artikel
                </a>
            </div>
        </section>
    </main>

    <style>
        /* Custom animations */
        @keyframes fade-in-down {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce-slow {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes gradient-x {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes rotate-y-5 {
            0% {
                transform: rotateY(0deg);
            }
            100% {
                transform: rotateY(5deg);
            }
        }

        .animate-fade-in-down {
            animation: fade-in-down 1s ease-out;
        }

        .animate-fade-in-up {
            animation: fade-in-up 1s ease-out;
        }

        .animate-bounce-slow {
            animation: bounce-slow 2s infinite;
        }

        .animate-gradient-x {
            background-size: 200% 200%;
            animation: gradient-x 15s ease infinite;
        }

        .hover\:rotate-y-5:hover {
            transform: rotateY(5deg);
        }

        .perspective {
            perspective: 1000px;
        }
    </style>

    <!-- JavaScript untuk Fungsi Scroll Horizontal -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.querySelector('.content-carousel');
        const slides = document.querySelectorAll('.snap-center');
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');

        // Buat dots pagination
        const dotsContainer = document.querySelector('.flex.justify-center');
        slides.forEach((_, index) => {
            const dot = document.createElement('button');
            dot.classList.add('w-3', 'h-3', 'rounded-full', 'bg-gray-300', 'hover:bg-purple-600', 'transition-colors', 'duration-300');
            dot.setAttribute('data-index', index);
            dotsContainer.appendChild(dot);

            // Event listener untuk dots
            dot.addEventListener('click', () => {
                const slideWidth = slides[0].offsetWidth;
                carousel.scrollTo({
                    left: slideWidth * index,
                    behavior: 'smooth'
                });
            });
        });

        // Fungsi untuk update active dot
        function updateActiveDot() {
            const slideWidth = slides[0].offsetWidth;
            const activeIndex = Math.round(carousel.scrollLeft / slideWidth);

            document.querySelectorAll('[data-index]').forEach((dot, index) => {
                if (index === activeIndex) {
                    dot.classList.remove('bg-gray-300');
                    dot.classList.add('bg-purple-600', 'w-4', 'h-4');
                } else {
                    dot.classList.add('bg-gray-300');
                    dot.classList.remove('bg-purple-600', 'w-4', 'h-4');
                }
            });
        }

        // Scroll event untuk update dots
        carousel.addEventListener('scroll', () => {
            updateActiveDot();
        });

        // Fungsi navigasi
        prevButton.addEventListener('click', () => {
            const slideWidth = slides[0].offsetWidth;
            carousel.scrollBy({
                left: -slideWidth,
                behavior: 'smooth'
            });
        });

        nextButton.addEventListener('click', () => {
            const slideWidth = slides[0].offsetWidth;
            carousel.scrollBy({
                left: slideWidth,
                behavior: 'smooth'
            });
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                prevButton.click();
            } else if (e.key === 'ArrowRight') {
                nextButton.click();
            }
        });

        // Inisialisasi dot pertama sebagai aktif
        updateActiveDot();

        // Touch swipe support untuk mobile
        let touchStartX = 0;
        let touchEndX = 0;

        carousel.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });

        carousel.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            if (touchEndX < touchStartX - 50) {
                nextButton.click(); // Swipe kiri
            }
            if (touchEndX > touchStartX + 50) {
                prevButton.click(); // Swipe kanan
            }
        }
    });
</script>
@endsection
