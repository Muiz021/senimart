@extends('backend.base')

@section('title', 'detail pemesanan produk')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Pemesanan Produk</h4>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Kode Booking</label>
                <input type="text" class="form-control" value="{{ $pemesanan_produk->kode_booking }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" class="form-control" value="{{ $pemesanan_produk->produk->nama }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" value="{{ $pemesanan_produk->nama }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nomor Pemesan</label>
                <input type="text" class="form-control" value="{{ $pemesanan_produk->nomor_ponsel }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Tanggal Pesan</label>
                <input type="date" class="form-control" value="{{ $pemesanan_produk->tanggal_pesan }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Status</label>
                <input type="text" class="form-control" value="{{ $pemesanan_produk->status }}" readonly>
            </div>
        </div>

        <a href="{{ route('pemesanan-produk.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
