<button type="button" class="text-secondary font-weight-bold text-decoration-underline pe-3 bg-transparent border-0"
    data-bs-toggle="modal" data-bs-target="#modalEdit{{ $payment_metode->id }}">
    Edit
</button>


<div class="modal fade" id="modalEdit{{ $payment_metode->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalEdit{{ $payment_metode->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEdit{{ $payment_metode->id }}">Edit Payment Metode</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container row justify-content-center ">
                    <!-- Informasi Transaksi -->
                    <div class="col-md-10">

                        <div class="card p-3">
                            <form action="{{ route('admin.user.update', $payment_metode->id) }}" method="POST">
                                @csrf
                                @method('PUT')


                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Nama" value="{{ $payment_metode->name }}">
                                </div>
                                @error('name')
                                    <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                                @enderror


                                <div class="mb-3">
                                    <label for="type" class="form-label">type</label>
                                    <select name="type" id="type" class="form-select">
                                        <option value="bank" {{ $payment_metode->type == 'bank' ? 'selected' : '' }}>
                                            Transfer
                                            Bank
                                        </option>
                                        <option value="wallet"
                                            {{ $payment_metode->type == 'wallet' ? 'selected' : '' }}>E-wallet
                                        </option>
                                    </select>
                                </div>
                                @error('type')
                                    <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                                @enderror

                                <div class="mb-3">
                                    <label for="rekening" class="form-label">Nomor Rekening</label>
                                    <input type="text" name="rekening" id="rekening" class="form-control"
                                        placeholder="Nama" value="{{ $payment_metode->rekening }}">
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
