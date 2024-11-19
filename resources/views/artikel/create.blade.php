@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-12" style="background: linear-gradient(to right, #f0f4f8, #d9e8fb); min-height: 100vh;">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                <div class="bg-white shadow-lg rounded-xl overflow-hidden transform">
                    <div class="bg-gray-800 text-white px-6 py-4 flex justify-between items-center">
                        <h4 class="font-semibold text-lg">Tambah Artikel</h4>
                        <a href="{{ route('artikel.index') }}"
                            class="text-white bg-blue-600 hover:bg-blue-800 py-1 px-3 rounded text-sm">Kembali</a>
                    </div>

                    <div class="p-6">
                        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
                                <input type="text" name="judul"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline @error('judul') border-red-500 @enderror"
                                    value="{{ old('judul') }}" placeholder="Nama" required>
                                @error('judul')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                                <textarea name="deskripsi" rows="3"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline @error('deskripsi') border-red-500 @enderror"
                                    placeholder="Deskripsi" required>{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                             <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Buat</label>
                                <input type="date" name="tanggal"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline @error('tanggal') border-red-500 @enderror"
                                    value="{{ old('tanggal') }}" placeholder="Nama" required>
                                @error('tanggal')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                                <select name="id_kategori"
                                    class="block appearance-none w-full bg-white border hover:border-gray-500 px-4 py-2 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('id_kategori') border-red-500 @enderror">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('id_kategori')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Foto</label>
                                <div
                                    class="border-2 border-dashed border-gray-300 rounded-lg p-4 hover:border-blue-500 transition">
                                    <input type="file" name="foto" accept="image/*"
                                        class="w-full h-32 opacity-0 absolute z-10 cursor-pointer"
                                        onchange="previewFile(event)" />
                                    <div class="flex flex-col items-center justify-center text-gray-500 space-y-2">
                                        <svg class="w-10 h-10 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm1 4a1 1 0 112 0 1 1 0 01-2 0zm-1 8a1 1 0 011-1h10a1 1 0 011 1H4zm9-2H5l3-4 2.25 2.71 1.25-1.51L15 13z">
                                            </path>
                                        </svg>
                                        <p class="text-sm">Klik atau seret file ke sini untuk mengunggah</p>
                                    </div>
                                </div>
                                <p id="file-name" class="text-gray-700 mt-2 text-sm"></p>
                                @error('foto')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-between">
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition transform hover:scale-105">Simpan</button>
                            </div>
                        </form>
                    </div>
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
