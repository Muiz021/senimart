@extends('backend.base')

@section('title', 'tambah produk kesenian')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Produk Kesenian</h4>

        <form enctype="multipart/form-data" action="{{ route('produk.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">gambar</label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Jenis seni</label>
                    <select class="form-select" name="seni_jenis_id">
                        @foreach ($jenis_seni as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                      </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">deskripsi</label>
                    <textarea name="deskripsi" class="form-control" cols="30" rows="10" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">fungsi</label>
                    <input type="text" name="fungsi" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">ukuran</label>
                    <input type="text" name="ukuran" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Genre</label>
                    <input type="text" name="genre" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Material</label>
                    <input type="text" name="material" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">seniman</label>
                    <input type="text" name="seniman" class="form-control" required>
                </div>
            </div>
            <a href="{{route('produk.index')}}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Kirim</button>

        </form>
    </div>
@endsection
