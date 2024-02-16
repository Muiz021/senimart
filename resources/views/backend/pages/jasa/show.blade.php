@extends('backend.base')

@section('title', 'detail tari kesenian')
@section('content')
@php
$baseURL = url('/');
@endphp
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Tari Kesenian</h4>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label class="form-label">gambar</label>
                <td><img src="{{ asset(Str::replace($baseURL . '/images/', '', '/images/' . $jasa->gambar)) }}"
                        width="100%"></td>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{$jasa->nama}}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Jenis seni</label>
             <input type="text" class="form-control" value="{{$jasa->seni_jenis->nama}}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">deskripsi</label>
                <textarea name="deskripsi" class="form-control" cols="30" rows="10" readonly>{{$jasa->deskripsi}}</textarea>
            </div>
        </div>
        <a href="{{route('jasa.index')}}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
