@php
    $baseURL = url('/');
@endphp

@forelse ($jasa as $item)
<div class="row g-0 border rounded my-3 my-lg-4 px-3 px-lg-0">
    <div class="col-lg-4">
        <img src="{{ asset(Str::replace($baseURL . '/images/', '', '/images/' . $item->gambar)) }}" width="100%"
            height="100%" alt="" style="aspect-ratio:16/9;object-fit: cover;">
    </div>
    <div class="col-lg-7 d-flex align-self-center mx-auto py-3 py-lg-5 px-2 px-lg-0">
        <a href="{{ route('pemesanan_jasa', $item->id) }}" class="text-decoration-none text-dark">
            <strong class="d-inline-block mb-4">{{ $item->nama }}</strong>
            <p class="mb-auto w-100" style="text-align:justify">
                {{ Str::limit($item->deskripsi, 400) }}</p>
        </a>
    </div>
</div>
@empty
<div class="row g-0 border rounded">
    <div class="col-8 col-lg-12 text-center">
        <h2>Data Kosong</h2>
    </div>
</div>
@endforelse
