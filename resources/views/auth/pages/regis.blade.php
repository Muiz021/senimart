@extends('auth.base')

@push('style')
<link rel="stylesheet" href="{{ asset('auth/css/registrasi.css') }}">
@endpush

@section('title', 'registrasi')
@section('content')
    <section id="registrasi" class="d-flex">
        <div class="row justify-content-center align-items-center h-100 mx-auto">
            <div class="col-lg-6 col-md-12">
                <div class="top-form text-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('auth/img/logo-senimart.png') }}" alt="" class="logo-senimart">
                        <h2>Senimart</h2>
                    </div>
                    <h5 class="text-top">Buat akun Kamu</h5>
                    <h5 class="text-bottom">Mari mulai perjalanan mu mencari dan menemukan
                        kesenian daerah yang sesuai keinginanmu</h5>
                </div>
                <form action="{{route('registrasi_action')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{old('nama')}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. Handphone</label>
                        <input type="text" class="form-control" name="nomor_ponsel" value="{{old('nomor_ponsel')}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="{{old('username')}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="{{old('password')}}">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <span>Sudah punya akun ? <a href="{{route('login')}}" class="url-daftar">Masuk</a></span>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
