<button type="button" class="text-secondary font-weight-bold text-decoration-underline pe-3 bg-transparent border-0"
    data-bs-toggle="modal" data-bs-target="#modalEdit{{ $benner_home->id }}">
    Edit
</button>


<div class="modal fade" id="modalEdit{{ $benner_home->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalEdit{{ $benner_home->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEdit{{ $benner_home->id }}">Edit Gambar Slider</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container row justify-content-center">
                    <div class="col-md-10">

                        <div class="card p-3">
                            <form action="{{ route('admin.benner.update', $benner_home->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="type" class="form-label">type</label>
                                    <input type="file" name="img" class="form-control" accept="image/*">
                                    <p class="text-muted text-xs mt-1">Maksimal ukuran file 50MB
                                    </p>
                                </div>
                                @error('img')
                                    <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                                @enderror


                                <button type="submit" class="btn btn-dark text-white">Simpan</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
