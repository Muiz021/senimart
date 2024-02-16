<style>
    .active {
        color: #000;
        font-weight: bold;
    }
</style>

<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container">
        <div class="d-flex">
            <a class="navbar-brand" href="{{ route('beranda') }}">
                <img src="{{ asset('auth/img/logo-senimart.png') }}" width="12%" alt="">
                <span class="fw-semibold">Senimart</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">


                <li class="nav-item {{ request()->is('beranda') ? 'active' : '' }}">
                    <a class="nav-link" aria-current="page" href="{{ route('beranda') }}">Beranda</a>
                </li>
                <li class="nav-item dropdown {{ request()->is('jasa*', 'produk*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Kategori</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ request()->is('jasa*') ? 'active' : '' }}"
                                href="{{ route('jasa') }}">Jasa</a></li>
                        <li><a class="dropdown-item {{ request()->is('produk*') ? 'active' : '' }}"
                                href="{{ route('produk') }}">Produk</a></li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->is('riwayat/pemesanan*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('riwayat.pemesanan') }}">Riwayat</a>
                </li>
                @if (Auth::user()->roles == 'pelanggan')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                @endif
        </div>
    </div>
</nav>

