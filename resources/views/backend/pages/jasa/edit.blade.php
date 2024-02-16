@extends('backend.base')

@section('title', 'edit tari kesenian')
@section('content')
    @php
        $baseURL = url('/');
    @endphp
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Tari Kesenian</h4>
        <form enctype="multipart/form-data" action="{{ route('jasa.update',$jasa->id) }}" method="post">
            @csrf
            @method('put')
            @if ($jasa->gambar)
            <div class="row">
                <div class="col-12 col-lg-4 mb-3">
                    <label class="form-label">gambar Sekarang</label>
                    <td><img src="{{ asset(Str::replace($baseURL . '/images/', '', '/images/' . $jasa->gambar)) }}"
                            width="100%"></td>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{$jasa->nama}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Jenis seni</label>
                    <select class="form-select" name="seni_jenis_id">
                        @foreach ($jenis_seni as $item)
                        <option value="{{$item->id}}" {{$item->id == $jasa->seni_jenis_id ? 'selected' : ''}}>{{$item->nama}}</option>
                        @endforeach
                      </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">deskripsi</label>
                    <textarea name="deskripsi" class="form-control" cols="30" rows="10" required>{{$jasa->deskripsi}}</textarea>
                </div>
            </div>

            <a href="{{ route('jasa.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Kirim</button>

        </form>
    </div>
@endsection
