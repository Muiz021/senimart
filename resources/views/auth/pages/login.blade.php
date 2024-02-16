@extends('auth.base')

@push('style')
<link rel="stylesheet" href="{{ asset('auth/css/login.css') }}">
@endpush

@section('title','login')
@section('content')
@include('sweetalert::alert')
<section id="login" class="d-flex">
    <div class="login-left w-50 d-none d-sm-inline-block">
        <img src="{{ asset('auth/img/bg-login.png') }}" class="bg-login">
    </div>
    <div class="login-right h-100">
        <div class="row justify-content-center align-items-center h-100 m-0">
            <div class="col-lg-6 col-sm-12">
                <div class="top-form text-center">
                    <img src="{{ asset('auth/img/logo-senimart.png') }}" alt=""
                        class="logo-senimart">
                    <h2>Senimart</h2>
                    <h5 class="text-top">Mencari dan menemukan kesenian daerah
                        sesuai keinginan</h5>
                    <h5 class="text-bottom">Masuk ke akun Kamu</h5>
                </div>
                <form action="{{route('login_action')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="{{old('username')}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="{{old('password')}}">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Masuk</button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <span>Belum punya akun ? <a href="{{route('registrasi')}}" class="url-daftar">Daftar</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
