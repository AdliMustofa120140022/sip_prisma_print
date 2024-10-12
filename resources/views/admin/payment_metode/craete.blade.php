<button type="button" class="btn bg-gradient-primary mt-4 mb-0 px-5 text-white me-3" data-bs-toggle="modal"
    data-bs-target="#modalCreate">
    create
</button>


<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby=modelCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id=modelCreateLabel">Edit User</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container row justify-content-center ">
                    <!-- Informasi Transaksi -->
                    <div class="col-md-10">

                        <div class="card p-3">
                            <form action="{{ route('admin.user.store') }}" method="POST">
                                @csrf


                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Nama" value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                                @enderror


                                <div class="mb-3">
                                    <label for="type" class="form-label">type</label>
                                    <select name="type" id="type" class="form-select">
                                        <option value="bank" {{ old('type') == 'bank' ? 'selected' : '' }}>Transfer
                                            Bank
                                        </option>
                                        <option value="wallet" {{ old('type') == 'user' ? 'selected' : '' }}>E-wallet
                                        </option>
                                    </select>
                                </div>
                                @error('type')
                                    <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                                @enderror

                                <div class="mb-3">
                                    <label for="rekening" class="form-label">Nomor Rekening</label>
                                    <input type="text" name="rekening" id="rekening" class="form-control"
                                        placeholder="Nama" value="{{ old('rekening') }}">
                                </div>
                                @error('rekening')
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
