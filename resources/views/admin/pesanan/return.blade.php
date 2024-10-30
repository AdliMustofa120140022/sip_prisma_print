<button type="button" class="text-secondary font-weight-bold text-decoration-underline pe-3 bg-transparent border-0"
    data-bs-toggle="modal" data-bs-target="#modalReturn{{ $transaksi->id }}">
    Kelola Retur
</button>


<div class="modal fade" id="modalReturn{{ $transaksi->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalReturnLabel{{ $transaksi->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalReturnLabel{{ $transaksi->id }}">
                    Update Status Retur</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container row gap-4">
                    <!-- Informasi Transaksi -->
                    <div class="col-md-5">
                        <div class="row">
                            <div class="card p-3">
                                <h6 class="border-bottom pb-2 mb-3">Informasi Retur
                                    <p>Alasan Retur:</p> {{ $transaksi->return_transaksi->alasan }}
                            </div>

                        </div>
                    </div>
                    <!-- Rincian Pembayaran -->
                    <div class="row mt-4">
                        <div class="card p-3">
                            <h6 class="border-bottom pb-2 mb-3">Dokumen Pendukung Retur</h6>
                            <div class="card h-100">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('storage/bukti_return/' . $transaksi->return_transaksi->bukti) }}"
                                        class="img-fluid rounded shadow" style="" alt="bukti pembayaran">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($transaksi->return_transaksi->status != 'approved')
                    <div class="col md-6">
                        {{-- <h6 class="border-bottom pb-2 mb-3 mt-4">Konfirmasi R</h6> --}}
                        <form action="{{ route('admin.return.update', $transaksi->return_transaksi->id) }}"
                            method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="status" class="form-label">Konfirmasi
                                    Retur</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Konfirmasi Retur</option>
                                    <option value="approved">Disetujui</option>
                                    <option value="rejected">Ditolak</option>
                                </select>
                            </div>

                            @error('status')
                                <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                            @enderror

                            <div class="mb-3">
                                <label for="reject_reason" class="form-label">Alasan Return Ditolak</label>
                                <textarea name="reject_reason" id="reject_reason" class="form-control" placeholder="Catatan Retur" rows="3"></textarea>
                            </div>
                            @error('reject_reason')
                                <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                            @enderror
                            <button type="submit" class="btn btn-dark text-white">Konfirmasi</button>
                        </form>
                    </div>
                @endif



            </div>

        </div>

    </div>
</div>
</div>
