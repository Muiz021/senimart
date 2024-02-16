@extends('backend.base')

@section('title', 'tambah jenis seni')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Jenis Seni</h4>

        <form enctype="multipart/form-data" action="{{ route('jenis-seni.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
            </div>
            <a href="{{route('jenis-seni.index')}}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Kirim</button>

        </form>
    </div>
@endsection
