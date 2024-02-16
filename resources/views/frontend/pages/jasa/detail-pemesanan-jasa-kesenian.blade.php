@extends('frontend.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/detail-pemesanan-produk.css') }}">
@endpush
@section('title', 'detail pemesanan produk kesenian')
@section('content')
@php
use Carbon\Carbon;
@endphp
    <section id="detail-pemesanan-produk">
        <div class="container">
            <div class="row">
                <div class="top-text d-flex align-items-center">
                  <a href="{{route('jasa')}}" class="text-decoration-none text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                      </svg>
                  </a>
                    <h2 class="mb-0">Detail Pemesanan</h2>
                </div>
             <div class="col-10 mx-auto">
                <form action="{{route('pemesanan_jasa.store', $jasa->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="jasa_id" value="{{$jasa->id}}">
                    <div class="mb-3 pb-4">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control" name="nama" id="nama" value="{{old('nama')}}">
                    </div>
                    <div class="mb-3 py-4">
                      <label for="nomor_ponsel" class="form-label">No Handphone</label>
                      <input type="text" class="form-control" name="nomor_ponsel" id="nomor_ponsel" value="{{old('nomor_ponsel')}}">
                    </div>
                    <div class="mb-3 py-4">
                      <label for="tanggal_tampil" class="form-label">Tanggal Tampil</label>
                      <input type="date" class="form-control" name="tanggal_tampil" id="tanggal_tampil" value="{{old('tanggal_tampil')}}">
                    </div>
                    <div class="mb-3 py-4">
                      <label for="tema" class="form-label">Tema</label>
                      <input type="text" class="form-control" name="tema" id="tema" value="{{old('tema')}}">
                    </div>
                    <div class="mb-3 py-4">
                      <label for="jam" class="form-label">Jam</label>
                      <input type="time" class="form-control" name="jam" id="jam" value="{{old('jam')}}">
                    </div>
                    <div class="mb-3 py-4">
                      <label for="lokasi" class="form-label">Lokasi</label>
                      <input type="text" class="form-control" name="lokasi" id="lokasi" value="{{old('lokasi')}}">
                    </div>
                    <div class="col-8 col-lg-4 mt-5 pt-lg-5 mx-auto">
                        <button type="submit" class="btn btn-info text-white fw-semibold p-lg-3 mb-0 w-100">Selesaikan Pemesanan</button>
                    </div>
                  </form>
             </div>
            </div>
        </div>
    </section>
@endsection
