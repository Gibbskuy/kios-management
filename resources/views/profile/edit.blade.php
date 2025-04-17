@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-t-xl shadow-sm">
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-t-xl px-6 py-4">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold text-white">{{ __('Edit Profile') }}</h2>
                        <a href="{{ route('profile.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-blue-700 bg-opacity-30 border border-white/30 rounded-lg text-white text-sm font-medium hover:bg-blue-600 transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-sm rounded-b-xl p-6 md:p-8">
                <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-6">
                            <div>
                                <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <div class="mt-1">
                                    <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ $profile->nama_lengkap }}"
                                        class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('nama_lengkap') border-red-500 @enderror"
                                        placeholder="Masukkan nama lengkap" required>
                                    @error('nama_lengkap')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="username" class="block text-sm font-medium text-gray-700">Nama</label>
                                <div class="mt-1">
                                    <input type="text" id="username"
                                        class="bg-gray-100 shadow-sm block w-full sm:text-sm border-gray-300 rounded-md cursor-not-allowed"
                                        value="{{ Auth::user()->name }}" disabled>
                                </div>
                            </div>

                            <div>
                                <label for="jk" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                <div class="mt-1">
                                    <select name="jk" id="jk"
                                        class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('jk') border-red-500 @enderror">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" {{ $profile->jk == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ $profile->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jk')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="tgl" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                <div class="mt-1">
                                    <input type="date" name="tgl" id="tgl" value="{{ $profile->tgl ?? old('tgl') }}"
                                        class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('tgl') border-red-500 @enderror"
                                        required>
                                    @error('tgl')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                                <div class="mt-1">
                                    <select name="agama" id="agama"
                                        class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('agama') border-red-500 @enderror">
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam" {{ $profile->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ $profile->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                        <option value="Budha" {{ $profile->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                                        <option value="Hindu" {{ $profile->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Konghucu" {{ $profile->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                    </select>
                                    @error('agama')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <div class="mt-1">
                                    <textarea name="alamat" id="alamat" rows="3"
                                        class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md @error('alamat') border-red-500 @enderror"
                                        placeholder="Masukkan alamat lengkap" required>{{ $profile->alamat ?? old('alamat') }}</textarea>
                                    @error('alamat')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="foto" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                                <div class="mt-2">
                                    @if ($profile->foto)
                                        <div class="mb-3">
                                            <div class="relative w-32 h-32 rounded-full overflow-hidden border-4 border-blue-100">
                                                <img src="{{ asset('images/profile/' . $profile->foto) }}" alt="Foto profil"
                                                     class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    @endif

                                    <div class="flex items-center">
                                        <div class="mt-1 flex justify-center px-6 py-4 border-2 border-gray-300 border-dashed rounded-md w-full">
                                            <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="foto" class="relative cursor-pointer rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                                        <span>Upload file</span>
                                                        <input id="foto" name="foto" type="file" class="sr-only">
                                                    </label>
                                                    <p class="pl-1">atau drag dan drop</p>
                                                </div>
                                                <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 2MB</p>
                                            </div>
                                        </div>
                                    </div>
                                    @error('foto')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-5 border-t border-gray-200">
                        <div class="flex justify-end">
                            <a href="{{ route('profile.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Batal
                            </a>
                            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('foto').onchange = function(evt) {
        const [file] = this.files;
        if (file) {
            const imgContainer = this.closest('div.space-y-6').querySelector('div.relative');

            if (imgContainer) {
                const img = imgContainer.querySelector('img');
                img.src = URL.createObjectURL(file);
            } else {
                const newImgContainer = document.createElement('div');
                newImgContainer.className = 'mb-3';
                newImgContainer.innerHTML = `
                    <div class="relative w-32 h-32 rounded-full overflow-hidden border-4 border-blue-100">
                        <img src="${URL.createObjectURL(file)}" alt="Preview foto profil" class="w-full h-full object-cover">
                    </div>
                `;

                const fileInputContainer = this.closest('div.flex');
                fileInputContainer.parentNode.insertBefore(newImgContainer, fileInputContainer);
            }
        }
    };
</script>
@endsection
