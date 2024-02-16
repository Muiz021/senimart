@extends('backend.base')

@section('title', 'edit jenis seni')
@section('content')
    @php
        $baseURL = url('/');
    @endphp
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Jenis Seni</h4>
        <form enctype="multipart/form-data" action="{{ route('jenis-seni.update',$jenis_seni->id) }}" method="post">
            @csrf
            @method('put')

            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{$jenis_seni->nama}}" required>
                </div>
            </div>


            <a href="{{ route('jenis-seni.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Kirim</button>

        </form>
    </div>
@endsection
