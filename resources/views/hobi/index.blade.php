@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full px-6 py-3">
                <div class="bg-white shadow-md rounded-lg border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 bg-gray-800 text-white flex justify-between items-center">
                        <h2 class="text-lg font-semibold text-white">Data Hobi</h2>
                        <div>
                            <a href="{{ route('hobi.create') }}"
                                class="text-sm bg-gray-800 border border-white text-white hover:bg-blue-500 rounded-lg transition px-3 py-1">Tambah
                                Data</a>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm text-center">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="px-4 py-2 border">No</th>
                                        <th class="px-4 py-2 border">Hobi</th>
                                        <th class="px-4 py-2 border">Aksi</th>
                                    </tr>
                                </thead>
                                @php $no = 1; @endphp
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($hobi as $item)
                                        <tr>
                                            <td class="px-4 py-2 border">{{ $no++ }}</td>
                                            <td class="px-4 py-2 border">{{ $item->hobi }}</td>
                                            <td class="px-4 py-2 border">
                                                 <form action="{{ route('hobi.destroy', $item->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <div class="py-2">
                                                 <button type="submit" class="text-sm border border-red-700 text-red-700 hover:text-white hover:bg-red-700 px-3 py-2 rounded-lg transition" onclick="return confirm('Apa Kamu Yakin Mau dihapus?');">
                                                     Hapus
                                                 </button>
                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
