@extends('backend.base')

@section('title', 'detail user')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">User</h4>

        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" value="{{ $user->username }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" value="{{ $user->nama }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nomor Ponsel</label>
                <input type="text" class="form-control" value="{{ $user->nomor_ponsel }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Status</label>
                <input type="text" class="form-control" value="{{ $user->status == 1 ? 'diterima' : 'belum diterima' }}"
                    readonly>
            </div>
        </div>

        <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
