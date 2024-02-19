@extends('backend.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endpush

@section('title', 'user')
@section('content')
@include('sweetalert::alert')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">User</h4>

        <div class="card">
            <div class="card-header flex-column flex-md-row">
                <div class="card-datatable table-responsive mt-3">
                    <table class="datatables-users table border-top" id="jasa">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>username</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $key => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('user.show', $item->id) }}"
                                            class="btn btn-info btn-sm me-2"><span><i class='bx bxs-show me-sm-2'></i> <span
                                                    class="d-none d-sm-inline-block">Show</span></span>
                                        </a>

                                        <a href="{{ route('user.edit', $item->id) }}"
                                            class="btn btn-primary btn-sm me-2"><span><i class="bx bx-edit me-sm-2"></i>
                                                <span class="d-none d-sm-inline-block">Edit</span></span>
                                        </a>

                                        <form action="{{ route('user.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm me-2"><span><i
                                                        class="bx bx-trash me-sm-2"></i>
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
