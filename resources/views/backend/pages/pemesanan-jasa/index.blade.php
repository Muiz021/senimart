@extends('backend.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endpush

@section('title', 'pemesanan jasa')
@section('content')
@include('sweetalert::alert')
@php
    use Carbon\Carbon;
@endphp
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Pemesanan Jasa</h4>
        <div class="card">
            <div class="card-header flex-column flex-md-row">
                <div class="card-datatable table-responsive mt-3">
                    <table class="datatables-users table border-top" id="jasa">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Booking</th>
                                <th>Nama Jasa</th>
                                <th>Nama Pemesan</th>
                                <th>Tanggal Pesan</th>
                                <th>Tanggal Tampil</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemesanan_jasa as $key => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_booking }}</td>
                                    <td>{{ $item->jasa->nama }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ Carbon::parse($item->tanggal_pesan)->isoFormat('dddd, DD MMMM YYYY') }}</td>
                                    <td>{{ Carbon::parse($item->tanggal_tampil)->isoFormat('dddd, DD MMMM YYYY') }}</td>
                                    <td>
                                        @if ($item->status == 'selesai')
                                        <span class="text-success">
                                            selesai
                                        </span>
                                        @elseif ($item->status == 'proses')
                                        <span class="text-warning">
                                            proses
                                        </span>
                                        @elseif ($item->status == 'ditolak')
                                        <span class="text-danger">
                                            ditolak
                                        </span>
                                        @else
                                        <span>
                                            tidak ada
                                        </span>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('pemesanan-jasa.show', $item->id) }}"
                                            class="btn btn-info btn-sm me-2"><i class='bx bxs-show'></i> <span
                                                    class="d-none d-sm-inline-block">Show</span></span>
                                        </a>

                                        <a href="{{ route('pemesanan-jasa.edit', $item->id) }}"
                                            class="btn btn-primary btn-sm me-2"><span><i class="bx bx-edit"></i>
                                                <span class="d-none d-sm-inline-block">Edit</span></span>
                                        </a>

                                        <form action="{{ route('pemesanan-jasa.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm me-2"><span><i
                                                        class="bx bx-trash"></i>
                                                    <span class="d-none d-sm-inline-block">Delete</span></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('backend/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#jasa').DataTable({
                // Scroll options
                scrollY: '300px',
                scrollX: true,
            });
        });
    </script>
@endpush
