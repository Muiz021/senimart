@extends('backend.base')

@section('title', 'tambah pesan')
@section('content')
    @php
        use App\Models\Pesan;
    @endphp
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Tentang Kami</h4>

        <form enctype="multipart/form-data" action="{{ route('pesan.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Jenis Pesan</label>
                    <select name="tipe" class="form-control">
                        @php
                            $pesan = ['pemesanan jasa', 'pemesanan produk'];
                        @endphp

                        @forelse ($pesan as $item)
                            @php
                                $existsInDB = Pesan::where('tipe', $item)->exists();
                            @endphp

                            @unless ($existsInDB)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endunless
                        @empty
                            <option value="pemesanan jasa">pemesanan jasa</option>
                            <option value="pemesanan produk">pemesanan produk</option>
                        @endforelse
                    </select>

                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">deskripsi</label>
                    <textarea name="deskripsi" class="form-control" cols="30" rows="10" required></textarea>
                </div>
            </div>
            <a href="{{ route('pesan.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Kirim</button>

        </form>
    </div>
@endsection
