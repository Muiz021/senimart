@extends('backend.base')

@section('title', 'detail pemesanan jasa')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Pemesanan Jasa</h4>

        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Kode Booking</label>
                <input type="text" class="form-control" value="{{ $pemesanan_jasa->kode_booking }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama Jasa</label>
                <input type="text" class="form-control" value="{{ $pemesanan_jasa->jasa->nama }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" value="{{ $pemesanan_jasa->nama }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nomor Pemesan</label>
                <input type="text" class="form-control" value="{{ $pemesanan_jasa->nomor_ponsel }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Tanggal Pesan</label>
                <input type="date" class="form-control" value="{{ $pemesanan_jasa->tanggal_pesan }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Tanggal Tampil</label>
                <input type="date" class="form-control" value="{{ $pemesanan_jasa->tanggal_tampil }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Tema</label>
                <input type="text" class="form-control" value="{{ $pemesanan_jasa->tema }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Jam</label>
                <input type="time" class="form-control" value="{{ $pemesanan_jasa->jam }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text" class="form-control" value="{{ $pemesanan_jasa->lokasi }}" readonly>
            </div>
        </div>

        <a href="{{ route('pemesanan-jasa.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
