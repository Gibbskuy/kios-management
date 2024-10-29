@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-gray-800 text-white p-3 flex justify-between items-center">
                    <div class="font-semibold">
                        {{ __('Kategori') }}
                    </div>
                    <div>
                        <a href="{{ route('kategori.create') }}" class="text-sm bg-gray-800 border border-white text-white hover:bg-blue-500 rounded-lg transition px-3 py-1">Tambah Data</a>
                    </div>
                </div>
                <div class="p-4">
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-center">
                                    <th class="py-2 px-4 border">No</th>
                                    <th class="py-2 px-4 border">Nama Kategori</th>
                                    <th class="py-2 px-4 border">Deskripsi</th>
                                    <th class="py-2 px-4 border">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = ($kategori->currentPage() - 1) * $kategori->perPage() + 1; @endphp
                                @forelse ($kategori as $data)
                                <tr class="text-center">
                                    <td class="py-2 px-4 border">{{ $no++ }}</td>
                                    <td class="py-2 px-4 border">{{ $data->nama_kategori }}</td>
                                    <td class="py-2 px-4 border">{{ $data->deskripsi }}</td>
                                    <td class="py-2 px-4 border">
                                        <form action="{{ route('kategori.destroy', $data->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <div class="py-2">
                                                <a href="{{ route('kategori.edit', $data->id) }}"
                                                 class="text-sm border border-green-700 text-green-700 hover:text-white hover:bg-green-700 px-3 py-2 rounded-lg transition">Edit</a> |
                                                 <button type="submit" class="text-sm border border-red-700 text-red-700 hover:text-white hover:bg-red-700 px-3 py-2 rounded-lg transition" onclick="return confirm('Are You Sure?');">
                                                     Hapus
                                                 </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="py-4 text-center text-gray-500">
                                        Data belum Tersedia.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $kategori->links() }} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

