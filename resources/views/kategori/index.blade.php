@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <div class="float-start mt-1">
                        {{ __('Kategori') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-outline-light">Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($kategori as $data)
                                <tr class="text-center">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama_kategori }}</td>

                                    <td>{{ $data->deskripsi }}</td>
                                    {{-- <td>
                                        <img src="{{ asset('/storage/barangs/' . $data->image) }}" class="rounded"
                                            style="width: 150px">
                                    </td> --}}
                                    <td>
                                        <form action="{{ route('kategori.destroy', $data->id) }}" method="POST" class="text-center">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('kategori.edit', $data->id) }}"
                                                class="btn btn-sm btn-outline-success">Edit</a> |
                                            <button type="submit" onsubmit="return confirm('Are You Sure ?');"
                                                class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Data data belum Tersedia.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {!! $produk->withQueryString()->links('pagination::bootstrap-4') !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
