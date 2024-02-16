@extends('frontend.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/detail-produk-kesenian.css') }}">
@endpush
@section('title', 'detail produk kesenian')
@section('content')
@php
$baseURL = url('/');
@endphp
    <section id="produk-kesenian">
        <div class="container">
            <div class="row">
                <div class="top-text d-flex align-items-center">
                  <a href="{{route('produk')}}" class="text-decoration-none text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                      </svg>
                  </a>
                    <h2 class="mb-0">Kategori Produk Kesenian</h2>
                </div>

                <div class="col-10 col-md-6 mx-auto">
                    <img src="{{asset(Str::replace($baseURL . '/images/', '', '/images/' . $produk->gambar))}}" width="100%" alt="">
                    {{-- <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('frontend/img/menu-2.png') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('frontend/img/menu-2.png') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('frontend/img/menu-2.png') }}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div> --}}
                </div>

                <h2 class="title">{{$produk->nama}}</h2>
                <hr class="hr1">
                <h2 class="title-2">Deskripsi</h2>
                <p>{{$produk->deskripsi}}</p>
                    <hr class="hr2">
                    <h2 class="title-2">Spesifikasi</h2>

                <div class="d-flex align-items-center text-spesifikasi">
                    <h5>Stok</h5>
                    <span>{{$produk->stok}}</span>
                </div>
                <div class="d-flex align-items-center text-spesifikasi">
                    <h5>Fungsi</h5>
                    <span>{{$produk->fungsi}}</span>
                </div>
                <div class="d-flex align-items-center text-spesifikasi">
                    <h5>Ukuran</h5>
                    <span>{{$produk->ukuran}}</span>
                </div>
                <div class="d-flex align-items-center text-spesifikasi">
                    <h5>Genre</h5>
                    <span>{{$produk->genre}}</span>
                </div>
                <div class="d-flex align-items-center text-spesifikasi">
                    <h5>Material</h5>
                    <span>{{$produk->material}}</span>
                </div>
                <div class="d-flex text-spesifikasi">
                    <h5>Seniman</h5>
                    <div class="d-flex flex-column text-seniman">
                        <span>{{$produk->seniman}}</span>
                        <div class="d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill me-1" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                              </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill mx-1" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                              </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill mx-1" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                              </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill mx-1" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                              </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill mx-1" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                              </svg>
                        </div>
                    </div>
                </div>

                <div class="col-8 col-lg-4 text-center mt-5 pt-lg-5 mx-auto">
                    <a href="{{route('pemesanan_produk',$produk->id)}}" class="btn btn-info text-center text-white fw-semibold p-lg-3 mb-0 w-100">Silahkan Pesan</a>
                </div>
            </div>
        </div>
    </section>
@endsection
