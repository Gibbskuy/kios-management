@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-700 to-indigo-800 px-6 py-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-bold text-white">Tambah Artikel</h2>
                    <a href="{{ route('artikel.index') }}"
                       class="px-4 py-2 bg-white text-blue-700 rounded-lg font-medium text-sm transition hover:bg-blue-50 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>

            <!-- Form Content -->
            <div class="p-6">
                <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Judul -->
                    <div class="mb-5">
                        <label for="judul" class="block text-gray-700 font-medium mb-2">Judul Artikel</label>
                        <input type="text" name="judul" id="judul"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring focus:ring-blue-100 focus:border-blue-500 transition-all @error('judul') border-red-500 @enderror"
                               value="{{ old('judul') }}" placeholder="Masukkan judul artikel..." required>
                        @error('judul')
                            <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-5">
                        <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                        <textarea name="deskripsi" id="editor" class="w-full">{{ old('deskripsi', $artikel->deskripsi ?? '') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Two column layout for date and category -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <!-- Tanggal -->
                        <div>
                            <label for="tanggal" class="block text-gray-700 font-medium mb-2">Tanggal Publikasi</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="date" name="tanggal" id="tanggal"
                                       class="w-full pl-10 px-4 py-3 rounded-lg border border-gray-300 focus:ring focus:ring-blue-100 focus:border-blue-500 transition-all @error('tanggal') border-red-500 @enderror"
                                       value="{{ old('tanggal') }}" required>
                            </div>
                            @error('tanggal')
                                <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label for="id_kategori" class="block text-gray-700 font-medium mb-2">Kategori</label>
                            <div class="relative">
                                <select name="id_kategori" id="id_kategori"
                                        class="appearance-none w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring focus:ring-blue-100 focus:border-blue-500 transition-all @error('id_kategori') border-red-500 @enderror">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $data)
                                        <option value="{{ $data->id }}" {{ old('id_kategori') == $data->id ? 'selected' : '' }}>
                                            {{ $data->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                            @error('id_kategori')
                                <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Foto -->
                    <div class="mb-6">
                        <label for="foto" class="block text-gray-700 font-medium mb-2">Foto Artikel</label>
                        <div class="mt-1 flex flex-col items-center space-y-4">
                            <!-- Image preview container -->
                            <div id="image-preview" class="w-full h-48 rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center overflow-hidden hidden">
                                <img id="preview-image" src="#" alt="Preview" class="max-h-full object-contain">
                            </div>

                            <!-- Upload area -->
                            <div class="relative w-full p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-blue-500 transition-colors">
                                <input type="file" name="foto" id="foto" accept="image/*"
                                       class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer"
                                       onchange="previewImage(this)">

                                <div class="flex flex-col items-center justify-center text-gray-500 pointer-events-none">
                                    <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="text-sm font-medium">Klik atau seret gambar untuk mengunggah</p>
                                    <p class="text-xs text-gray-400 mt-1">PNG, JPG, JPEG hingga 2MB</p>
                                </div>
                            </div>

                            <p id="file-name" class="text-sm text-gray-500"></p>
                        </div>
                        @error('foto')
                            <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <div class="flex justify-end">
                        <button type="submit"
                                class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-medium rounded-lg shadow hover:shadow-lg transform hover:-translate-y-0.5 transition-all">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                Simpan Artikel
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
   <!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/h9hyszltud55yfxoblvg0pt38pk5rdy3rvlcyqlijkwjrv28/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });

  // Image preview function
  function previewImage(input) {
    const preview = document.getElementById('preview-image');
    const previewContainer = document.getElementById('image-preview');
    const fileName = document.getElementById('file-name');

    if (input.files && input.files[0]) {
      const reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
        previewContainer.classList.remove('hidden');
        fileName.textContent = input.files[0].name;
      };

      reader.readAsDataURL(input.files[0]);
    } else {
      previewContainer.classList.add('hidden');
      fileName.textContent = '';
    }
  }
</script>
@endpush
