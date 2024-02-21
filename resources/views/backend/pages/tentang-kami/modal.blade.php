@foreach ($tentang_kami as $point)
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modal-edit-{{ $point->id }}" tabindex="-1" data-bs-backdrop="static"
        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Tentang Kami
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('tentang-kami.update',$point->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">nomor whatsapp</label>
                                <input type="tel" name="nomor_wa" class="form-control" pattern="^\+62\d{9,}$" title="Format nomor harus dimulai dengan +62 dan minimal 10 digit angka" placeholder="dimulai dengan +62 dan minimal 10 digit angka" value="{{$point->nomor_wa}}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Url Instagram</label>
                                <input type="url" name="url_instagram" class="form-control" placeholder="silahkan masukan url intagram" value="{{$point->url_instagram}}"  required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Url Youtube</label>
                                <input type="url" name="url_youtube" class="form-control" placeholder="silahkan masukan url youtube" value="{{$point->url_youtube}}"  required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Url Website</label>
                                <input type="url" name="url_website" class="form-control" placeholder="silahkan masukan url website" value="{{$point->url_website}}"  required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Tutup
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
