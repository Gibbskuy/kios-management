@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('hobi.index')}}" class="btn btn-sm btn-primary" style="float: right">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('hobi.update',$genre->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-2">
                            <label for="">Hobi</label>
                            <input type="text" class="form-control @error('hobi') is-invalid @enderror"
                                name="hobi" value="{{$hobi->hobi}}">
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
