@extends('backend.base')

@section('title', 'edit pemesanan produk')
@section('content')
@include('sweetalert::alert')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Pemesanan Produk</h4>

        <form action="{{route('pemesanan-produk.update', $pemesanan_produk->id)}}" method="post">
            @csrf
            @method('put')
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
                    <input type="text" class="form-control" value="{{ $pemesanan_produk->nama }}" name="nama"
                        placeholder="silahkan masukan nama" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Jumlah Pesan</label>
                    <input type="number" class="form-control" value="{{ $pemesanan_produk->jumlah_produk }}" name="jumlah_produk"
                        placeholder="silahkan masukan jumlah pesan" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Nomor Pemesan</label>
                    <input type="text" class="form-control" value="{{ $pemesanan_produk->nomor_ponsel }}"
                        name="nomor_ponsel" placeholder="silahkan masukan nomor_ponsel" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Tanggal Pesan</label>
                    <input type="date" class="form-control" value="{{ $pemesanan_produk->tanggal_pesan }}"
                        name="tanggal_pesan" placeholder="silahkan masukan tanggal pesan" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" required>
                        <option value="selesai" {{ $pemesanan_produk->status == 'selesai' ? 'selected' : '' }}>Selesai
                        </option>
                        <option value="proses" {{ $pemesanan_produk->status == 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="ditolak" {{ $pemesanan_produk->status == 'ditolak' ? 'selected' : '' }}>Ditolak
                        </option>
                    </select>
                </div>
            </div>

            <a href="{{ route('pemesanan-produk.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>

    </div>
@endsection
