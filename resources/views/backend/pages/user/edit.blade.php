@extends('backend.base')

@section('title', 'edit user')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">User</h4>

        <form action="{{ route('user.update', $user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" value="{{ $user->username }}" name="username" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="silahkan masukan password">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" value="{{ $user->nama }}" name="nama" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Nomor Ponsel</label>
                    <input type="text" class="form-control" value="{{ $user->nomor_ponsel }}" name="nomor_ponsel" required>
                </div>
            </div>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
@endsection
