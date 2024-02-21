@php
    use App\Models\TentangKami;
    $tentang_kami = TentangKami::first();
@endphp

<footer class="container-fluid">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 mt-5 border-top">
        <div class="col-2 ms-5">
            <a href="{{ route('beranda') }}" class="text-decoration-none text-dark w-50 d-flex align-items-center">
                <img src="{{ asset('auth/img/logo-senimart.png') }}" width="50%" class="d-none d-sm-inline"
                    alt="">
                <p class="mb-0 fw-semibold fs-5">Senimart</p>
            </a>
        </div>
        <div class="col-10 d-flex align-items-center ms-auto">
            <div class="col mb-3">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ route('beranda') }}"
                            class="nav-link p-0 text-muted">Beranda</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('jasa') }}" class="nav-link p-0 text-muted">Jasa</a>
                    </li>
                    <li class="nav-item mb-2"><a href="{{ route('produk') }}" class="nav-link p-0 text-muted">Produk</a>
                    </li>
                    <li class="nav-item mb-2"><a href="{{ route('riwayat.pemesanan') }}"
                            class="nav-link p-0 text-muted">Riwayat</a></li>
                </ul>
            </div>

            <div class="col">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tentang Kami</a></li>
                    <li class="nav-item mb-2"><a href="https://wa.me/{{$tentang_kami->nomor_wa}}" class="nav-link p-0 text-muted"><i
                                class="bi bi-whatsapp"></i> {{$tentang_kami->nomor_wa}}</a></li>
                    <li class="nav-item mb-2"><a href="{{$tentang_kami->url_instagram}}" class="nav-link p-0 text-muted"><i
                                class="bi bi-instagram"></i> Senimart</a></li>
                    <li class="nav-item mb-2"><a href="{{$tentang_kami->url_youtube}}" class="nav-link p-0 text-muted"><i
                                class="bi bi-youtube"></i> Senimart</a></li>
                    <li class="nav-item mb-2"><a href="{{$tentang_kami->url_website}}" class="nav-link p-0 text-muted"><i
                                class="bi bi-c-circle"></i> Senimart</a></li>
                </ul>
            </div>
        </div>

    </div>
</footer>
