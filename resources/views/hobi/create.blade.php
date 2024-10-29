@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card overflow-hidden">
                <div class="px-6 py-2x bg-gray-800 text-white flex justify-between items-center">
                        <h2 class="text-lg font-semibold text-white">Data Hobi</h2>
                         <div class="card-header">
                    <a href="{{route('hobi.index')}}" class="border border-white text-white hover:bg-blue-700 py-1 px-3 rounded text-sm" style="float: right">Kembali</a>
                </div>
                    </div>

                <div class="card-body">
                    <form action="{{route('hobi.store')}}" method="post">
                        @csrf
                        <div class="mb-2">
                            <label class="font-bold mb-2" >Hobi</label>
                            <input type="text" class="form-control @error('hobi') is-invalid @enderror"
                                name="hobi" placeholder="Hobi Kamu Apa">
                            @error('hobi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <button class="btn btn-sm btn-success" type="submit">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
