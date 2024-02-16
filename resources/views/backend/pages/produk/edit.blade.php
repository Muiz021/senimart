@extends('backend.base')

@section('title', 'edit produk kesenian')
@section('content')
@php
$baseURL = url('/');
@endphp
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Produk Kesenian</h4>

        <form enctype="multipart/form-data" action="{{ route('produk.update',$produk->id) }}" method="post">
            @csrf
            @method('put')
            @if ($produk->gambar)
            <div class="row">
                <div class="col-12 col-lg-4 mb-3">
                    <label class="form-label">gambar Sekarang</label>
                    <td><img src="{{ asset(Str::replace($baseURL . '/images/', '', '/images/' . $produk->gambar)) }}"
                            width="100%"></td>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{$produk->nama}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Jenis seni</label>
                    <select class="form-select" name="seni_jenis_id">
                        @foreach ($jenis_seni as $item)
                        <option value="{{$item->id}}" {{$item->id == $produk->seni_jenis_id ? 'selected' : ''}}>{{$item->nama}}</option>
                        @endforeach
                      </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">deskripsi</label>
                    <textarea name="deskripsi" class="form-control" cols="30" rows="10">{{$produk->deskripsi}}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" value="{{$produk->stok}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">fungsi</label>
                    <input type="text" name="fungsi" class="form-control" value="{{$produk->fungsi}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">ukuran</label>
                    <input type="text" name="ukuran" class="form-control" value="{{$produk->ukuran}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Genre</label>
                    <input type="text" name="genre" class="form-control" value="{{$produk->genre}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Material</label>
                    <input type="text" name="material" class="form-control" value="{{$produk->material}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">seniman</label>
                    <input type="text" name="seniman" class="form-control" value="{{$produk->seniman}}" required>
                </div>
            </div>
            <a href="{{route('produk.index')}}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Kirim</button>

        </form>
    </div>
@endsection
