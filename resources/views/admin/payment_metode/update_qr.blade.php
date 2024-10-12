<button type="button" class="text-secondary font-weight-bold text-decoration-underline pe-3 bg-transparent border-0"
    data-bs-toggle="modal" data-bs-target="#modalQr{{ $payment_metode->id }}">
    Update QRIS
</button>


<div class="modal fade" id="modalQr{{ $payment_metode->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalQrLabel{{ $payment_metode->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalQrLabel{{ $payment_metode->id }}">Update QR Code</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container row justify-content-center ">
                    <div class="col-md-6">

                        <div class="card p-3">
                            <div class="card-header pb-0">
                                <h6>QR code</h6>
                            </div>
                            @if ($payment_metode->qr_code)
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('storage/payment_metode/' . $payment_metode->qr_code) }}"
                                        class="img-fluid rounded shadow" style="" alt="bukti pembayaran">
                                </div>
                            @else
                                <span>QRIS Belum tersedia</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="card p-3">
                            <form action="{{ route('admin.payment-metode.update-qr-code', $payment_metode->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="qr_code" class="form-label">QRIS</label>
                                    <input type="file" name="qr_code" id="qr_code" class="form-control"
                                        placeholder="Nama" value="{{ old('qr_code') }}">
                                </div>
                                @error('qr_code')
                                    <p class="text-danger text-center p-0 m-0">{{ $message }}</p>
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
