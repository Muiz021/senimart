@extends('frontend.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/detail-riwayat-produk.css') }}">
@endpush
@section('title', 'riwayat pemesanan produk kesenian')
@section('content')
    <section id="detail-riwayat-produk">
        <div class="container">
            <div class="row">
                <div class="top-text d-flex align-items-center">
                  <a href="{{route('riwayat.pemesanan')}}" class="text-decoration-none text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                      </svg>
                  </a>
                    <h2 class="mb-0">Detail Pemesanan Produk</h2>
                </div>

             <div class="col-10 mx-auto">
                <form action="{{route('pemesanan_produk.update',$produk->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3 pb-4">
                      <label for="kode_booking" class="form-label">Kode Booking</label>
                      <input type="text" class="form-control" id="kode_booking" name="kode_booking" readonly>
                    </div>
                    <div class="mb-3 py-4">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="nama" value="{{$produk->nama}}" readonly>
                    </div>
                    <div class="mb-3 py-4">
                      <label for="nomor_ponsel" class="form-label">No Handphone</label>
                      <input type="text" class="form-control" id="nomor_ponsel" value="{{$produk->nomor_ponsel}}" readonly>
                    </div>
                    <div class="mb-3 py-4">
                        <label for="judul_produk" class="form-label">Judul Produk</label>
                        <input type="text" class="form-control" id="judul_produk" value="{{$produk->produk->nama}}" readonly>
                      </div>
                    <div class="mb-3 py-4">
                      <label for="tanggal_pesan" class="form-label">Tanggal Pemesanan</label>
                      <input type="date" class="form-control" id="tanggal_pesan" value="{{$produk->tanggal_pesan}}" readonly>
                    </div>
                    <div class="mb-3 py-4">
                        <label for="jumlah_produk" class="form-label">Jumlah Produk</label>
                        <input type="number" class="form-control" id="jumlah_produk" value="{{$produk->jumlah_produk}}" readonly>
                      </div>
                    <div class="col-8 col-lg-4 mt-5 pt-lg-5 mx-auto">
                        <button type="submit" class="btn btn-info text-white fw-semibold p-lg-3 mb-0 w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp me-3 d-none d-lg-inline" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                              </svg>
                              Lanjut ke Whatsapp
                        </button>
                    </div>
                  </form>
             </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {

            $.get('/produk/kode_booking', function(data) {
                $('#kode_booking').val(data.kode_booking);
            });
        });
    </script>
@endpush
