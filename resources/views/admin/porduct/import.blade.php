<button type="button" class="btn bg-gradient-info mt-4 mb-0 px-5 text-white me-3" data-bs-toggle="modal"
    data-bs-target="#modalImport">
    import Produk
</button>


<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby=modalImportLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id=modalImportLabel">Import Produk</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="card p-3">
                    <form action="{{ route('admin.product.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="file" class="form-label">File</label>
                            <input type="file" name="file" id="file" class="form-control" placeholder="Nama">
                        </div>
                        @error('file')
                            <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                        @enderror

                        <div class="card-footer">
                            <a href="{{ asset('public/doc/Template_impor_produk.xlsx') }}"
                                download='Template_impor_produk.xlsx' class="btn btn-success text-white">Download
                                tempplate</a>
                            <button type="submit" class="btn btn-dark text-white">Simpan</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
