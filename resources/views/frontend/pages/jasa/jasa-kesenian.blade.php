@extends('frontend.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/jasa-kesenian.css') }}">
@endpush

@section('title', 'jasa kesenian')

@section('content')
    @php
        $baseURL = url('/');
    @endphp
    <section id="jasa-kesenian">
        <div class="row">
            <div class="col-12 col-lg-3 bg-secondary h-100 ps-4 py-0 py-lg-5">
                <div class="text-top d-flex align-items-center my-4 mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor"
                        style="color:#fff" class="bi bi-funnel me-3" viewBox="0 0 16 16">
                        <path
                            d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z" />
                    </svg>
                    <h3 class="mb-0 text-white fs-4">Filter</h3>
                </div>
                <hr>

                @foreach ($jenis_seni as $item)
                    <div class="d-flex align-items-center my-3">
                        <input type="radio" id="jenis-{{ $item->id }}" name="jenis_seni_id"
                            class="square-radio me-3">
                        <label class="text-white">{{ $item->nama }}</label>
                    </div>
                @endforeach
            </div>
            <div class="col-12 col-lg-9 px-0 px-lg-5">
                <h2>Kategori Jasa Kesenian</h2>
                <div id="table">
                    @include('frontend.pages.jasa.menu-tari')
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{ url('https://code.jquery.com/jquery-3.6.0.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('input[name="jenis_seni_id"]').change(function() {
                var jenisSeniId = $(this).attr('id').split('-')[1];
                // console.log(jenisSeniId)
                $.ajax({
                    type: 'get',
                    url: '/jasa/sort', // Ganti dengan URL proses yang sesuai
                    data: {
                        jenis_seni_id: jenisSeniId
                    },
                    success: function(response) {
                        // Proses respon dari server
                        console.log(response);
                        $('#table').html(response);
                        // Lakukan sesuatu dengan respon dari server, misalnya memperbarui bagian halaman tertentu
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
