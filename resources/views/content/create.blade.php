@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <!-- Card Container -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-8 py-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-white text-2xl font-bold">Tambah Content</h2>
                        <a href="{{ route('content.index') }}"
                           class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-5 py-2 rounded-lg transition duration-200 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            <span>Kembali</span>
                        </a>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-8">
                    <form action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Judul -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Judul</label>
                            <input type="text" name="judul"
                                class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:ring focus:ring-blue-200 focus:border-blue-500 transition duration-200 @error('judul') border-red-500 @enderror"
                                placeholder="Masukkan judul konten" value="{{ old('judul') }}" required>
                            @error('judul')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-6">
                            <label for="deskripsi" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                            <textarea name="deskripsi" id="editor" class="w-full">{{ old('deskripsi', $artikel->deskripsi ?? '') }}</textarea>
                            @error('deskripsi')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Alamat</label>
                            <textarea name="alamat" rows="2"
                                class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 focus:ring focus:ring-blue-200 focus:border-blue-500 transition duration-200 @error('alamat') border-red-500 @enderror"
                                placeholder="Masukkan alamat" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Foto -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Foto</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-xl bg-gray-50 hover:border-blue-400 transition-all duration-200">
                                <input type="file" name="foto" accept="image/*" id="foto"
                                    class="absolute w-full h-full opacity-0 cursor-pointer z-10" onchange="previewFile(event)">

                                <div class="flex flex-col items-center justify-center py-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="mt-2 text-sm text-gray-500">Klik atau seret file ke sini untuk unggah</p>
                                    <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG, GIF (Maks. 5MB)</p>
                                </div>

                                <div id="image-preview" class="hidden mt-4 flex justify-center">
                                    <img id="preview-image" src="#" alt="Preview" class="max-h-48 rounded">
                                </div>
                            </div>
                            <p id="file-name" class="text-gray-600 text-sm mt-2 italic"></p>
                            @error('foto')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-8">
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-bold py-3 px-6 rounded-lg shadow hover:shadow-lg transform transition hover:-translate-y-1 duration-200">
                                Simpan Konten
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function previewFile(event) {
        const file = event.target.files[0];
        const fileName = file ? file.name : "Belum ada file yang dipilih";
        const fileNameElement = document.getElementById("file-name");
        const previewImage = document.getElementById("preview-image");
        const imagePreview = document.getElementById("image-preview");

        fileNameElement.innerText = fileName;

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                imagePreview.classList.remove("hidden");
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.classList.add("hidden");
        }
    }
</script>

<!-- TinyMCE Editor -->
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
