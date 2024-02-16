@extends('frontend.base')

@push('style')
    <link rel="stylesheet" href="{{asset('frontend/css/riwayat-pemesanan.css')}}">
@endpush
@section('title', 'riwayat pemesanan')
@section('content')
@php
    use Carbon\Carbon;
    $baseURL = url('/');
@endphp
    <section id="riwayat-pemesanan">
        <div class="container">
            <h2>Riwayat pemesanan</h2>
            @forelse ($gabung as $item)
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                @if($item instanceof \App\Models\PemesananProduk)
                <div class="col-12 col-lg-4 mx-auto">
                    <img src="{{ asset(Str::replace($baseURL . '/images/', '', '/images/' . $item->produk->gambar))}}" width="100%" height="" alt="">
                </div>
                <div class="col-12 col-lg-8 d-flex ps-lg-5 pt-lg-3 pe-lg-1 p-2 flex-column align-self-center">
                    <strong class="mb-5">{{$item->produk->nama}}</strong>
                    <div class="d-flex align-items-center text">
                        <h5>Tanggal Pemesanan</h5>
                        <span>: {{Carbon::parse($item->tanggal_pesan)->isoFormat('dddd, DD MMMM YYYY')}}</span>
                    </div>
                    <div class="d-flex align-items-center text">
                        <h5>Nama Seniman</h5>
                        <span>: {{$item->produk->seniman}}</span>
                    </div>
                    <div class="col-4 col-lg-4 ms-auto">
                        <a href="{{route('riwayat_produk',$item->id)}}" class="btn btn-info fw-semibold text-white py-lg-3 w-100">Detail</a>
                    </div>
                </div>
                @elseif($item instanceof \App\Models\PemesananJasa)
                <div class="col-12 col-lg-4 mx-auto">
                    <img src="{{ asset(Str::replace($baseURL . '/images/', '', '/images/' . $item->jasa->gambar))}}" width="100%" height="" alt="">
                </div>
                <div class="col-12 col-lg-8 d-flex ps-lg-5 pt-lg-3 pe-lg-1 p-2 flex-column align-self-center">
                    <strong class="mb-5">{{$item->jasa->nama}}</strong>
                    <div class="d-flex align-items-center text">
                        <h5>Tanggal Pemesanan</h5>
                        <span>: {{Carbon::parse($item->tanggal_pesan)->isoFormat('dddd, DD MMMM YYYY')}}</span>
                    </div>
                    <div class="d-flex align-items-center text">
                        <h5>Tanggal Tampil</h5>
                        <span>: {{Carbon::parse($item->tanggal_tampil)->isoFormat('dddd, DD MMMM YYYY')}}</span>
                    </div>
                    <div class="col-4 col-lg-4 ms-auto">
                        <a href="{{route('riwayat_jasa',$item->id)}}" class="btn btn-info fw-semibold text-white py-lg-3 w-100">Detail</a>
                    </div>
                </div>
                @endif


            </div>
            @empty
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-12 mx-auto text-center">
                    <h2>Kosong!</h2>
                </div>
            </div>
            @endforelse

        </div>
    </section>
@endsection
