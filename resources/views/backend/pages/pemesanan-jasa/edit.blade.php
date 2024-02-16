@extends('backend.base')

@section('title', 'edit pemesanan jasa')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Pemesanan Jasa</h4>

   <form action="{{route('pemesanan-jasa.update',$pemesanan_jasa->id)}}" method="post">
    @csrf
    @method('put')
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
            <input type="text" class="form-control" value="{{ $pemesanan_jasa->nama }}" name="nama" required>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nomor Pemesan</label>
            <input type="text" class="form-control" value="{{ $pemesanan_jasa->nomor_ponsel }}" name="nomor_ponsel" required>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Tanggal Pesan</label>
            <input type="date" class="form-control" value="{{ $pemesanan_jasa->tanggal_pesan }}" name="tanggal_pesan" required>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Tanggal Tampil</label>
            <input type="date" class="form-control" value="{{ $pemesanan_jasa->tanggal_tampil }}" name="tanggal_tampil" required>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Tema</label>
            <input type="text" class="form-control" value="{{ $pemesanan_jasa->tema }}" name="tema" required>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Jam</label>
            <input type="time" class="form-control" value="{{ $pemesanan_jasa->jam }}" name="jam" required>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text" class="form-control" value="{{ $pemesanan_jasa->lokasi }}" name="lokasi" required>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Status</label>
            <select class="form-select" name="status" required>
                <option value="selesai" {{ $pemesanan_jasa->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="proses" {{ $pemesanan_jasa->status == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="ditolak" {{ $pemesanan_jasa->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>
    </div>

    <a href="{{ route('pemesanan-jasa.index') }}" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Kirim</button>
</form>
</div>
@endsection
