@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-gray-800 text-white px-6 py-3">
                    <div class="flex justify-between items-center">
                        <div class="font-semibold">
                            {{ __('Produk') }}
                        </div>
                        <div>
                            <a href="{{ route('produk.create') }}" class="text-sm bg-gray-800 border border-white text-white hover:bg-blue-500 rounded-lg transition px-3 py-1">Tambah Data</a>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border-collapse border border-gray-300">
                            <thead>
                                <tr class="text-center bg-gray-100">
                                    <th class="border px-4 py-2">No</th>
                                    <th class="border px-4 py-2">Nama Produk</th>
                                    <th class="border px-4 py-2">Harga</th>
                                    <th class="border px-4 py-2">Stok</th>
                                    <th class="border px-4 py-2">Kategori</th>
                                    <th class="border px-4 py-2">Deskripsi</th>
                                    <th class="border px-4 py-2">Images</th>
                                    <th class="border px-4 py-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($produk as $data)
                                <tr class="text-center">
                                    <td class="border px-4 py-2">{{ $no++ }}</td>
                                    <td class="border px-4 py-2">{{ $data->nama_produk }}</td>
                                    <td class="border px-4 py-2">Rp.{{ $data->harga }}</td>
                                    <td class="border px-4 py-2">{{ $data->stok }}</td>
                                    <td class="border px-4 py-2">{{ $data->kategori->nama_kategori }}</td>
                                    <td class="border px-4 py-2">{{ $data->deskripsi }}</td>
                                    <td class="border px-4 py-2">
                                        <center><img src="{{asset('images/produk/'.$data->foto)}}" class="w-32 h-24 object-cover"></center>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <form action="{{ route('produk.destroy', $data->id) }}" method="POST" class="text-center">
                                            @csrf
                                            @method('DELETE')
                                            <div class="mt-3">
                                                <a href="{{ route('produk.edit', $data->id) }}" class="text-sm border border-green-700 text-green-700 hover:text-white hover:bg-green-700 px-3 py-2 rounded-lg transition">Edit</a> |
                                                <button type="submit" class="text-sm border border-red-700 text-red-700 hover:text-white hover:bg-red-700 px-3 py-2 rounded-lg transition" onclick="return confirm('Are You Sure?');">Hapus</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center border px-4 py-2">
                                        Data data belum tersedia.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-4">
                            {!! $produk->withQueryString()->links('pagination::tailwind') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
