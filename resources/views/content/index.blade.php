@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-gray-50 to-white min-h-screen">
    <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-500">
                    Our Featured Content
                </span>
            </h1>
            <p class="mt-4 text-xl text-gray-500 max-w-3xl mx-auto">
                Explore our carefully curated collection of exceptional content
            </p>
        </div>

        <!-- Action Button -->
        <div class="flex justify-center mb-10">
            @can('content-create')
                <a href="{{ route('content.create') }}"
                   class="inline-flex items-center px-6 py-3 border border-transparent rounded-full
                          shadow-sm text-base font-medium text-white bg-gradient-to-r from-blue-600
                          to-indigo-600 hover:from-blue-700 hover:to-indigo-700 transition-all
                          transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2
                          focus:ring-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Create New Content
                </a>
            @endcan
        </div>

        <!-- Content Cards -->
        <div class="space-y-12">
            @forelse ($content as $data)
                <div class="bg-white shadow-xl rounded-2xl overflow-hidden transition-all transform hover:shadow-2xl
                            hover:scale-[1.01] border border-gray-100">
                    <div class="flex flex-col lg:flex-row">
                        <!-- Image -->
                        <div class="lg:w-2/5 h-64 lg:h-auto overflow-hidden">
                            <img src="{{ asset('images/content/' . $data->foto) }}"
                                alt="{{ $data->judul }}"
                                class="w-full h-full object-cover object-center transition-transform duration-500 hover:scale-105">
                        </div>

                        <!-- Content -->
                        <div class="lg:w-3/5 p-8">
                            <div class="flex flex-col h-full justify-between">
                                <div>
                                    <div class="flex justify-between items-start">
                                        <h2 class="text-2xl font-bold text-gray-800 hover:text-blue-600 transition">
                                            {{ $data->judul }}
                                        </h2>
                                    </div>

                                    <div class="mt-3 flex items-center text-gray-500 text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span>{{ Str::limit($data->alamat, 60) }}</span>
                                    </div>

                                    <div class="mt-6">
                                        <p class="text-gray-600 leading-relaxed">
                                            {!! $data->deskripsi !!}
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-8 flex flex-wrap gap-3">
                                    {{-- <a href="{{ route('content.show', $data->id) }}"
                                        class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-50 text-blue-700
                                              rounded-lg text-sm font-medium hover:bg-blue-100 transition-colors">
                                        <span>Read More</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a> --}}

                                    @can('content-edit')
                                        <a href="{{ route('content.edit', $data->id) }}"
                                            class="inline-flex items-center justify-center px-5 py-2.5 bg-green-50 text-green-700
                                                  rounded-lg text-sm font-medium hover:bg-green-100 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            <span>Edit</span>
                                        </a>
                                    @endcan

                                    @can('content-delete')
                                        <form action="{{ route('content.destroy', $data->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center justify-center px-5 py-2.5 bg-red-50 text-red-700
                                                       rounded-lg text-sm font-medium hover:bg-red-100 transition-colors"
                                                onclick="return confirm('Are you sure you want to delete this content?');">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-12 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-50 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">No Content Available</h3>
                    <p class="text-gray-500 max-w-sm mx-auto">
                        We don't have any content to display right now. Check back later or create new content.
                    </p>

                    @can('content-create')
                        <a href="{{ route('content.create') }}" class="mt-6 inline-flex items-center px-4 py-2
                                  border border-transparent rounded-md shadow-sm text-sm font-medium text-white
                                  bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                                  focus:ring-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Create New Content
                        </a>
                    @endcan
                </div>
            @endforelse
        </div>

        @if(isset($content) && method_exists($content, 'links'))
            <div class="mt-12">
                {{ $content->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
