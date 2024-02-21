@extends('backend.base')

@section('title', 'pesan')
@section('content')
    @include('sweetalert::alert')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Pesan</h4>

        <div class="card">
            <div class="card-header flex-column flex-md-row">
                @if ($pesan->count() != 2)
                    <div class="text-end pt-3 pt-md-0">
                        <a href="{{ route('pesan.create') }}" class="btn btn-primary">
                            <span><i class="bx bx-plus me-sm-2"></i><span class="d-none d-sm-inline-block">Tambah
                                    Pesan</span></span>
                        </a>
                    </div>
                @endif
                <div class="card-body row">
                    @forelse ($pesan as $item)
                        <div class="col-12 col-lg-6">
                            <div class="form-label">{{ $item->tipe }}</div>
                            <textarea name="deskripsi" class="form-control" cols="30" rows="10" readonly>{{ str_replace('%20', ' ', $item->deskripsi) }}</textarea>
                            <!-- Modal trigger button -->
                            <div class="d-flex mt-2">
                                <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                                    data-bs-target="#modal-edit-{{$item->id}}">
                                    edit
                                </button>
                                <form action="{{route('pesan.destroy',$item->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        hapus
                                    </button>
                                </form>
                            </div>

                        </div>
                    @empty
                        <h1 class="mx-auto text-center">Kosong!</h1>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    @include('backend.pages.pesan.modal')
@endsection
