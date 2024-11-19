@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-12 min-h-screen flex justify-center items-center bg-gradient-to-r from-gray-100 to-blue-100">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow-lg rounded-xl overflow-hidden transform">
                <!-- Header -->
                <div class="bg-blue-600 text-white px-6 py-4 flex justify-between items-center">
                    <h4 class="font-semibold text-lg">Tambah Content</h4>
                    <a href="{{ route('content.index') }}"
                        class="text-sm bg-blue-500 hover:bg-blue-700 py-2 px-4 rounded transition">Kembali</a>
                </div>

                <!-- Form -->
                <div class="p-6">
                    <form action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Judul -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-2">Judul</label>
                            <input type="text" name="judul"
                                class="block w-full bg-gray-100 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none @error('judul') border-red-500 @enderror"
                                placeholder="Masukkan judul konten" value="{{ old('judul') }}" required>
                            @error('judul')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                            <textarea name="deskripsi" rows="4"
                                class="block w-full bg-gray-100 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none @error('deskripsi') border-red-500 @enderror"
                                placeholder="Masukkan deskripsi konten" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-2">Alamat</label>
                            <textarea name="alamat" rows="2"
                                class="block w-full bg-gray-100 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none @error('alamat') border-red-500 @enderror"
                                placeholder="Masukkan alamat" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Foto -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-2">Foto</label>
                            <div
                                class="relative flex items-center justify-center border-2 border-dashed rounded-lg bg-gray-50 hover:border-blue-500 transition">
                                <input type="file" name="foto" accept="image/*" id="foto"
                                    class="absolute w-full h-full opacity-0 cursor-pointer" onchange="previewFile(event)">
                                <div class="text-center py-8 px-4">
                                    <p class="text-gray-500 mt-2 text-sm">Klik atau seret file ke sini untuk unggah</p>
                                </div>
                            </div>
                            <p id="file-name" class="text-gray-700 text-sm mt-2"></p>
                            @error('foto')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="flex justify-end mt-6">
                            <button type="submit"
                                class="bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg shadow-lg hover:bg-blue-700 hover:shadow-xl focus:outline-none transition transform hover:scale-105">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function previewFile(event) {
        const fileName = event.target.files[0]?.name || "Belum ada file yang dipilih";
        document.getElementById("file-name").innerText = fileName;
    }
</script>
