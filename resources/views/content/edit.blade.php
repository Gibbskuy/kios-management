@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Page Header with Breadcrumbs -->
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900">{{ __('Edit Content') }}</h1>
                <nav class="mt-2 flex items-center text-sm font-medium text-gray-500">
                    {{-- <a href="{{ route('dashboard') }}" class="hover:text-indigo-600">Dashboard</a> --}}
                    <span class="mx-2">/</span>
                    <a href="{{ route('content.index') }}" class="hover:text-indigo-600">Content</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-700">Edit</span>
                </nav>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('content.index') }}"
                   class="flex items-center justify-center text-sm font-medium rounded-md text-indigo-700 bg-indigo-50 px-4 py-2 hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white shadow-xl rounded-lg overflow-hidden border border-gray-100">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4">
                <h2 class="text-xl font-semibold text-white">{{ $content->judul }}</h2>
                <p class="text-indigo-100 text-sm mt-1">Update your content information</p>
            </div>

            <div class="p-8">
                <form action="{{ route('content.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="space-y-6">
                        <!-- Judul Field -->
                        <div>
                            <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="text"
                                       name="judul"
                                       id="judul"
                                       class="block w-full pr-10 focus:ring-indigo-500 focus:border-indigo-500 pl-3 py-3 text-gray-700 border-gray-300 rounded-md transition-all duration-200 @error('judul') border-red-500 ring-red-500 @enderror"
                                       value="{{ $content->judul }}"
                                       placeholder="Masukkan judul content"
                                       required>
                                @error('judul')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('judul')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi Field -->
                        <div>
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <div class="mt-1">
                                <textarea
                                    name="deskripsi"
                                    id="deskripsi"
                                    rows="3"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md transition-all duration-200 @error('deskripsi') border-red-500 @enderror"
                                    placeholder="Deskripsi detail tentang content ini"
                                    required>{{ $content->deskripsi }}</textarea>
                                @error('deskripsi')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Alamat Field -->
                        <div>
                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                            <div class="mt-1">
                                <textarea
                                    name="alamat"
                                    id="alamat"
                                    rows="3"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md transition-all duration-200 @error('alamat') border-red-500 @enderror"
                                    placeholder="Masukkan alamat lengkap"
                                    required>{{ $content->alamat }}</textarea>
                                @error('alamat')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Foto Field -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Foto</label>
                            <div class="mt-2 flex flex-col space-y-4">
                                @if($content->foto)
                                <div class="relative group">
                                    <div class="overflow-hidden rounded-lg border border-gray-200 bg-gray-50 w-full sm:w-64 h-auto">
                                        <img src="{{ asset('images/content/' . $content->foto) }}" alt="Current photo" class="w-full h-auto object-cover transition duration-300 group-hover:opacity-90">
                                    </div>
                                    <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-300 rounded-lg">
                                        <p class="text-white text-xs font-medium">Current photo</p>
                                    </div>
                                </div>
                                @endif

                                <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="foto" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="foto" name="foto" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>
                                @error('foto')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-5 border-t border-gray-200">
                        <div class="flex justify-end">
                            <a href="{{ route('content.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-3">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script src="https://cdn.tiny.cloud/1/h9hyszltud55yfxoblvg0pt38pk5rdy3rvlcyqlijkwjrv28/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#editor',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        height: 300,
        skin: 'oxide',
        content_css: 'default',
        menubar: false,
        branding: false,
        statusbar: false,
    });
</script>
@endpush
