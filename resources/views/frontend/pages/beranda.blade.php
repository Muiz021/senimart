@extends('frontend.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/beranda.css') }}">
    <link rel="stylesheet" href="{{ url('https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css') }}">
@endpush

@section('title', 'beranda')
@section('content')
    @include('sweetalert::alert')

    <section id="hero">
        <div class="container-fluid p-4">
            <div class="row">
                <div class="col-12 col-lg-8 mx-auto">
                    <form action="{{route('search_action')}}" method="post">
                        @csrf
                        <div class="input-group input-group-lg">
                            <button type="submit" class="input-group-text"><i class="bi bi-search"></i></button>
                            <input type="search" class="form-control" placeholder="Temukan kesenian keinginanmu" id="search" name="nama">
                        </div>

                    </form>
                </div>
                <div class="col-12">
                    <img src="{{ asset('frontend/img/hero.png') }}" width="100%" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="menu">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-lg-6 mt-lg-0">
                    <a href="{{ route('jasa') }}">
                        <img src="{{ asset('frontend/img/menu-1.png') }}" width="100%" alt="">
                    </a>
                </div>
                <div class="col-8 col-lg-6 mt-3 mt-lg-0">
                    <a href="{{ route('produk') }}">
                        <img src="{{ asset('frontend/img/menu-2.png') }}" width="100%" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{ url('https://code.jquery.com/jquery-3.6.0.js') }}"></script>
    <script src="{{ url('https://code.jquery.com/ui/1.13.2/jquery-ui.js') }}"></script>
    <script>
        var data = [];
        $.ajax({
            type: 'GET',
            url: '/riwayat/search',
            success: function(response) {
                startAutoComplete(response);
            }
        });

        function startAutoComplete(data) {
            $("#search").autocomplete({
                source: data
            });
        }
    </script>
@endpush
