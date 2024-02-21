@extends('backend.base')

@section('title', 'tambah tentang kami')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Tentang Kami</h4>

        <form enctype="multipart/form-data" action="{{ route('tentang-kami.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">nomor whatsapp</label>
                    <input type="tel" name="nomor_wa" class="form-control" pattern="^\+62\d{9,}$" title="Format nomor harus dimulai dengan +62 dan minimal 10 digit angka" placeholder="dimulai dengan +62 dan minimal 10 digit angka" value="+62" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Url Instagram</label>
                    <input type="url" name="url_instagram" class="form-control" placeholder="silahkan masukan url intagram" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Url Youtube</label>
                    <input type="url" name="url_youtube" class="form-control" placeholder="silahkan masukan url youtube" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Url Website</label>
                    <input type="url" name="url_website" class="form-control" placeholder="silahkan masukan url website" required>
                </div>
            </div>
            <a href="{{ route('tentang-kami.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Kirim</button>

        </form>
    </div>
@endsection
