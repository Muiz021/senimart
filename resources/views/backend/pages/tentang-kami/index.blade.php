@extends('backend.base')

@section('title', 'tentang kami')
@section('content')
    @include('sweetalert::alert')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Tentang Kami</h4>

        <div class="card">
            <div class="card-header flex-column flex-md-row">
                @if ($tentang_kami->count() != 1)
                    <div class="text-end pt-3 pt-md-0">
                        <a href="{{ route('tentang-kami.create') }}" class="btn btn-primary">
                            <span><i class="bx bx-plus me-sm-2"></i><span class="d-none d-sm-inline-block">Tambah
                                    Tentang Kami</span></span>
                        </a>
                    </div>
                @endif
                <div class="card-body row">
                    @forelse ($tentang_kami as $item)
                        <div class="col-12">
                            <div class="row">
                                <div class="col mb-3">
                                    <label class="form-label">nomor whatsapp</label>
                                    <input type="tel" class="form-control" value="{{$item->nomor_wa}}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label class="form-label">Url Instagram</label>
                                    <input type="url" class="form-control" value="{{$item->url_instagram}}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label class="form-label">Url Youtube</label>
                                    <input type="url" name="url_youtube" class="form-control" value="{{$item->url_youtube}}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label class="form-label">Url Website</label>
                                    <input type="url" name="url_website" class="form-control" value="{{$item->url_website}}" readonly>
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                                    data-bs-target="#modal-edit-{{$item->id}}">
                                    edit
                                </button>
                                <form action="{{route('tentang-kami.destroy',$item->id)}}" method="POST">
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
    @include('backend.pages.tentang-kami.modal')
@endsection
