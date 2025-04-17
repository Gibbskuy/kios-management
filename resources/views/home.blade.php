@extends('layouts.app')

@section('content')
    <!-- Hero Section with Parallax Effect -->
    <section class="relative h-screen overflow-hidden">
        <div class="absolute inset-0 transform transition-transform duration-1500 ease-out hover:scale-110">
            <img src="/web-1608427_1280.webp" alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900/90 to-black/80"></div>
        </div>
        <div class="relative h-full flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8">
            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 animate-fade-in-down text-center">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-purple-400 via-pink-500 to-red-500">
                    ArtikelZ
                </span>
            </h1>
            <p class="mt-6 text-xl md:text-2xl text-gray-300 max-w-3xl text-center leading-relaxed animate-fade-in-up">
                Panduan lengkap untuk menjelajahi dunia melalui kacamata berita dan artikel mendalam.
                Tersedia dalam berbagai bahasa untuk pembaca global.
            </p>
            <div class="mt-12 animate-pulse-slow">
                <a href="#content" class="inline-flex items-center justify-center p-5 rounded-full bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white transition-all duration-300 shadow-lg hover:shadow-purple-500/30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <main class="bg-gray-900">
        <!-- Featured Content Section with Improved Carousel -->
        <section id="content" class="py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-gray-900 to-gray-800">
            <div class="container mx-auto">
                <h2 class="text-4xl font-bold text-center mb-16 relative">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-pink-500">
                        Trending Headlines
                    </span>
                </h2>

                <div class="relative overflow-hidden">
                    <button id="prevButton" class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-black/50 hover:bg-black/70 text-white p-4 rounded-r-lg shadow-lg transition-all duration-300 focus:outline-none backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <button id="nextButton" class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-black/50 hover:bg-black/70 text-white p-4 rounded-l-lg shadow-lg transition-all duration-300 focus:outline-none backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <div class="content-carousel overflow-x-auto pb-8 hide-scrollbar">
                        <div class="flex space-x-6 px-4 snap-x snap-mandatory">
                            @forelse ($content as $data)
                                <div class="snap-center flex-shrink-0 w-full md:w-[calc(100%-2rem)] lg:w-[calc(80%-2rem)] xl:w-[calc(70%-2rem)]">
                                    <div class="group relative bg-gray-800 rounded-xl shadow-2xl overflow-hidden transform transition-all duration-500 hover:scale-[1.02] hover:shadow-purple-500/20 border border-gray-700">
                                        <div class="h-64 lg:h-96 w-full bg-cover bg-center relative" style="background-image: url('{{ asset('images/content/' . $data->foto) }}');">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent"></div>

                                            <div class="absolute bottom-0 left-0 right-0 p-8 text-white text-left">
                                                <div class="inline-block px-3 py-1 bg-pink-600 text-white text-sm font-semibold rounded-md mb-4 animate-pulse">Breaking News</div>
                                                <h1 class="text-3xl font-bold text-shadow-lg">{{ $data->judul }}</h1>
                                            </div>
                                        </div>

                                        <div class="p-8">
                                            <p class="text-lg text-gray-300 leading-relaxed mb-6">
                                                {!! $data->deskripsi !!}
                                            </p>
                                            <div class="flex items-center space-x-2 text-gray-400 mb-6 mt-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                <span>{{ $data->alamat }}</span>
                                            </div>
                                            <button class="group inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-medium rounded-lg transition-all duration-300 shadow-lg hover:shadow-purple-500/30">
                                                Baca Selengkapnya
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="w-full text-center py-16 bg-gray-800 rounded-xl shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
                                    </svg>
                                    <p class="text-xl text-gray-400">Data Content belum tersedia.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="flex justify-center space-x-2 mt-6">
                        <!-- Pagination dots will be inserted here by JavaScript -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Latest Articles Section with Card Hover Effects -->
        <section class="py-24 relative overflow-hidden bg-gray-900">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-900/20 via-black/40 to-pink-900/20 animate-gradient-x"></div>

            <!-- Background Effects -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
                <div class="absolute -top-40 -left-40 w-80 h-80 bg-purple-700/10 rounded-full blur-3xl"></div>
                <div class="absolute top-20 right-20 w-60 h-60 bg-pink-700/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-40 right-60 w-80 h-80 bg-indigo-700/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-10 left-40 w-60 h-60 bg-purple-700/10 rounded-full blur-3xl"></div>
            </div>

            <div class="container mx-auto relative z-10 px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-white mb-4">Latest Stories</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto"></div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($artikel as $data)
                        <div class="group perspective">
                            <div class="relative h-full bg-gray-800 rounded-2xl shadow-xl overflow-hidden transform transition-all duration-500 hover:shadow-purple-500/20 hover:-translate-y-2 group-hover:rotate-y-5">
                                <div class="absolute top-4 right-4 z-10">
                                    <span class="inline-block px-3 py-1 bg-purple-600 text-white text-xs font-semibold rounded-full transform transition-all duration-300 group-hover:scale-110">{{ $data->kategori->nama_kategori }}</span>
                                </div>

                                <div class="overflow-hidden h-64">
                                    <img src="{{ asset('images/artikel/' . $data->foto) }}" alt="{{ $data->judul }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </div>

                                <div class="p-8">
                                    <h3 class="text-xl font-bold text-white mb-4 group-hover:text-purple-400 transition-colors duration-300">
                                        {{ $data->judul }}
                                    </h3>

                                    <div class="flex items-center text-sm text-gray-400 mb-6 space-x-4">
                                        <span class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-pink-500 mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                            </svg>
                                            {{ $data->kategori->nama_kategori }}
                                        </span>
                                        <span class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-pink-500 mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{ $data->tanggal }}
                                        </span>
                                    </div>

                                    <a href="{{ route('artikel.show', $data->slug) }}"
                                        class="inline-flex items-center text-purple-400 font-semibold hover:text-pink-400 transition-all duration-300 group">
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
                            <div class="inline-block p-8 bg-gray-800/50 backdrop-blur-sm rounded-lg border border-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-600 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p class="text-xl text-gray-400">Data Artikel belum tersedia.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- CTA Section with Glowing Effect -->
        <section class="py-24 bg-black text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-purple-900/30 via-black to-black"></div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
                <h2 class="text-3xl md:text-5xl font-bold mb-8 animate-fade-in-down">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-purple-400 via-pink-500 to-red-500">
                        Discover More Stories
                    </span>
                </h2>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto mb-12">Jelajahi koleksi artikel kami yang beragam dan temukan wawasan baru yang dapat mengubah perspektif Anda.</p>
                <a href="{{route ('artikel.index')}}" class="inline-block px-10 py-5 text-lg font-semibold rounded-full bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 transform transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-purple-500/30 animate-pulse-slow">
                    Explore All Articles
                </a>
            </div>
        </section>
    </main>

    <style>
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

        @keyframes pulse-slow {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.05);
                opacity: 0.9;
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
            animation: fade-in-down 1.2s ease-out;
        }

        .animate-fade-in-up {
            animation: fade-in-up 1.2s ease-out;
        }

        .animate-pulse-slow {
            animation: pulse-slow 3s infinite;
        }

        .animate-gradient-x {
            background-size: 200% 200%;
            animation: gradient-x 15s ease infinite;
        }

        .group-hover\:rotate-y-5:hover {
            transform: rotateY(5deg);
        }

        .perspective {
            perspective: 1000px;
        }

        .text-shadow-lg {
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.querySelector('.content-carousel');
        const slides = document.querySelectorAll('.snap-center');
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');

        // Create pagination dots with animation
        const dotsContainer = document.querySelector('.flex.justify-center');
        slides.forEach((_, index) => {
            const dot = document.createElement('button');
            dot.classList.add('w-3', 'h-3', 'rounded-full', 'bg-gray-600', 'hover:bg-pink-500', 'transition-all', 'duration-300');
            dot.setAttribute('data-index', index);
            dotsContainer.appendChild(dot);

            // Event listener for dots
            dot.addEventListener('click', () => {
                const slideWidth = slides[0].offsetWidth;
                carousel.scrollTo({
                    left: slideWidth * index,
                    behavior: 'smooth'
                });
            });
        });

        // Function to update active dot with animation
        function updateActiveDot() {
            const slideWidth = slides[0].offsetWidth;
            const activeIndex = Math.round(carousel.scrollLeft / slideWidth);

            document.querySelectorAll('[data-index]').forEach((dot, index) => {
                if (index === activeIndex) {
                    dot.classList.remove('bg-gray-600');
                    dot.classList.add('bg-pink-500', 'w-6', 'h-3');
                } else {
                    dot.classList.add('bg-gray-600');
                    dot.classList.remove('bg-pink-500', 'w-6', 'h-3');
                }
            });
        }

        carousel.addEventListener('scroll', () => {
            updateActiveDot();
        });

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

        // Auto-rotate carousel
        let autoRotateInterval = setInterval(() => {
            nextButton.click();
        }, 7000);

        // Pause auto-rotate on hover
        carousel.addEventListener('mouseenter', () => {
            clearInterval(autoRotateInterval);
        });

        carousel.addEventListener('mouseleave', () => {
            autoRotateInterval = setInterval(() => {
                nextButton.click();
            }, 7000);
        });

        updateActiveDot();

        // Touch swipe functionality
        let touchStartX = 0;
        let touchEndX = 0;

        carousel.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
            clearInterval(autoRotateInterval);
        });

        carousel.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();

            // Resume auto-rotate after touch
            autoRotateInterval = setInterval(() => {
                nextButton.click();
            }, 7000);
        });

        function handleSwipe() {
            if (touchEndX < touchStartX - 50) {
                nextButton.click(); // Swipe left
            }
            if (touchEndX > touchStartX + 50) {
                prevButton.click(); // Swipe right
            }
        }

        // Animate articles on scroll
        const animateOnScroll = () => {
            const articles = document.querySelectorAll('.perspective');

            articles.forEach((article, index) => {
                const rect = article.getBoundingClientRect();
                const isInViewport = rect.top <= window.innerHeight * 0.8;

                if (isInViewport) {
                    setTimeout(() => {
                        article.classList.add('animate-fade-in-up');
                        article.style.opacity = '1';
                    }, index * 150);
                }
            });
        };

        // Set initial state for animation
        document.querySelectorAll('.perspective').forEach(article => {
            article.style.opacity = '0';
        });

        // Run on scroll
        window.addEventListener('scroll', animateOnScroll);
        // Initial check
        animateOnScroll();
    });
</script>
@endsection
