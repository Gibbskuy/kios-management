@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Header Card -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-indigo-700 to-blue-600 px-8 py-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-white">{{ __('Edit Artikel') }}</h2>
                    <a href="{{ route('artikel.index') }}"
                       class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-medium text-sm text-indigo-600 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>

            <!-- Form Container -->
            <div class="p-8">
                <form action="{{ route('artikel.update', $artikel->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @method('put')
                    @csrf

                    <!-- Judul -->
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul Artikel</label>
                        <input type="text" id="judul" name="judul"
                            class="block w-full px-4 py-3 rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out @error('judul') border-red-500 @enderror"
                            value="{{ $artikel->judul }}" placeholder="Masukkan judul artikel..." required>
                        @error('judul')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="editor" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <div class="border border-gray-300 rounded-md shadow-sm">
                            <textarea name="deskripsi" id="editor" class="w-full">{{ old('deskripsi', $artikel->deskripsi ?? '') }}</textarea>
                        </div>
                        @error('deskripsi')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Two-column layout for date and category -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Tanggal -->
                        <div>
                            <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Publikasi</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input type="date" id="tanggal" name="tanggal"
                                    class="block w-full pl-10 pr-4 py-3 rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out @error('tanggal') border-red-500 @enderror"
                                    value="{{ old('tanggal') }}" required>
                            </div>
                            @error('tanggal')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label for="id_kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                            <div class="relative">
                                <select id="id_kategori" name="id_kategori"
                                    class="block w-full pl-4 pr-10 py-3 text-base rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 appearance-none transition duration-150 ease-in-out @error('id_kategori') border-red-500 @enderror">
                                    <option value="{{ $artikel->id_kategori }}">{{ $artikel->kategori->nama_kategori ?? 'Pilih Kategori' }}</option>
                                    @foreach ($kategori as $data)
                                        <option value="{{ $data->slug }}" {{ old('id_kategori') == $data->slug ? 'selected' : '' }}>
                                            {{ $data->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            @error('id_kategori')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">Foto</label>
                        @if ($artikel->foto)
                            <div class="mb-4 p-2 border border-gray-200 rounded-lg bg-gray-50">
                                <p class="text-xs text-gray-500 mb-2">Foto saat ini:</p>
                                <img src="{{ asset('images/artikel/' . $artikel->foto) }}" alt="Foto artikel" class="w-48 h-auto rounded-md shadow">
                            </div>
                        @endif
                        <div class="mt-2">
                            <label for="foto-upload" class="cursor-pointer flex items-center justify-center w-full px-6 py-4 border-2 border-gray-300 border-dashed rounded-md transition duration-150 ease-in-out hover:border-indigo-500 hover:bg-gray-50 @error('foto') border-red-500 @enderror">
                                <div class="space-y-1 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <span class="relative font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            Upload foto baru
                                        </span>
                                        <p class="pl-1">atau drag and drop</p>
                                    </div>
                                </div>
                                <input id="foto-upload" name="foto" type="file" class="sr-only">
                            </label>
                        </div>
                        @error('foto')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-5">
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                </svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Helpful tips card -->
        <div class="mt-8 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg shadow p-6 border border-blue-100">
            <h3 class="text-base font-medium text-indigo-800 mb-2">Tips untuk artikel yang baik:</h3>
            <ul class="space-y-2 text-sm text-gray-600">
                <li class="flex items-start">
                    <svg class="flex-shrink-0 h-5 w-5 text-indigo-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-2">Gunakan judul yang menarik dan deskriptif</span>
                </li>
                <li class="flex items-start">
                    <svg class="flex-shrink-0 h-5 w-5 text-indigo-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-2">Tambahkan gambar berkualitas tinggi yang relevan</span>
                </li>
                <li class="flex items-start">
                    <svg class="flex-shrink-0 h-5 w-5 text-indigo-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-2">Pastikan konten terstruktur dengan heading yang jelas</span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/h9hyszltud55yfxoblvg0pt38pk5rdy3rvlcyqlijkwjrv28/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    height: 400,
    skin: 'oxide',
    content_css: 'default',
    menubar: true,
    branding: false,
    promotion: false,
    statusbar: true,
    resize: true,
    setup: function(editor) {
      editor.on('change', function() {
        editor.save();
      });
    }
  });

  // Preview uploaded image before submitting
  const fileInput = document.getElementById('foto-upload');
  const dropArea = fileInput.parentElement;

  // Handle drag events
  ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false);
  });

  function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
  }

  ['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, highlight, false);
  });

  ['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, unhighlight, false);
  });

  function highlight() {
    dropArea.classList.add('border-indigo-500', 'bg-indigo-50');
  }

  function unhighlight() {
    dropArea.classList.remove('border-indigo-500', 'bg-indigo-50');
  }

  dropArea.addEventListener('drop', handleDrop, false);

  function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
    fileInput.files = files;
  }

  fileInput.addEventListener('change', updateFileName);

  function updateFileName() {
    const fileName = fileInput.files[0]?.name;
    if (fileName) {
      // You could update UI to show selected filename
      const fileNameDisplay = document.createElement('p');
      fileNameDisplay.textContent = `File selected: ${fileName}`;
      fileNameDisplay.classList.add('mt-2', 'text-sm', 'text-gray-600');

      // Remove any existing filename display
      const existingDisplay = dropArea.parentElement.querySelector('p:not(.text-red-600)');
      if (existingDisplay && existingDisplay !== dropArea.querySelector('p')) {
        existingDisplay.remove();
      }

      dropArea.parentElement.appendChild(fileNameDisplay);
    }
  }
</script>
@endpush
