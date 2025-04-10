@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-5">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-4">
                        <div class="flex justify-between items-center">
                            <h4 class="font-semibold text-lg">{{ __('Profile') }}</h4>
                            <a href="{{ route('profile.index') }}"
                                class="border border-white text-white hover:bg-blue-700 py-1 px-3 rounded text-sm">Kembali</a>
                        </div>
                    </div>

                    <div class="p-8">
                        <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-5">
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap"
                                    class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama_lengkap') border-red-500 @enderror"
                                    value="{{ old('nama_lengkap') }}" placeholder="Nama Lengkap" required>
                                @error('nama_lengkap')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Jenis Kelamin</label>
                                <select name="jk"
                                    class="shadow appearance-none border rounded-lg w-full py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('jk') border-red-500 @enderror">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('jk')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Tanggal Lahir</label>
                                <input type="date" name="tgl"
                                    class="shadow appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tgl') border-red-500 @enderror"
                                    value="{{ old('tgl') }}" required>
                                @error('tgl')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Agama</label>
                                <select name="agama"
                                    class="shadow appearance-none border rounded-lg w-full py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('agama') border-red-500 @enderror">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                @error('agama')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="alamat" class="block mb-2 font-semibold">Alamat</label>
                                <textarea name="alamat" id="alamat" class="w-full p-2 border border-gray-300 rounded-md" rows="10">{{ old('alamat', $artikel->alamat ?? '') }}</textarea>
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
                                    class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Simpan</button>
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
