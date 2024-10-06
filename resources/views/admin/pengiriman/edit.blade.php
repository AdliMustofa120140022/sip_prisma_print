<button type="button" class="text-secondary font-weight-bold text-decoration-underline pe-3 bg-transparent border-0"
    data-bs-toggle="modal" data-bs-target="#modelDetail{{ $transaksi->id }}">
    Update Pengiriman
</button>


<div class="modal fade" id="modelDetail{{ $transaksi->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalDetailLabel{{ $transaksi->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel{{ $transaksi->id }}">
                    Pengiriman</h5>
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
                                <h6 class="border-bottom pb-2 mb-3">Informasi Transaksi</h6>
                                <div class="mb-2">
                                    <strong>ID Transaksi:</strong> {{ $transaksi->transaksi_code }}
                                </div>
                                <div class="mb-2">
                                    <strong>Tanggal Transaksi:</strong>
                                    {{ $transaksi->created_at->format('d M Y, H:i') }}
                                </div>
                                <div class="mb-2">
                                    <strong>Jumlah Pembayaran:</strong> Rp.
                                    {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                                </div>
                                <div class="mb-2">
                                    <strong>Metode Pengiriman:</strong>
                                    {{ $transaksi->transaksi_data->metode_pengiriman }}
                                </div>
                                <div class="mb-2">
                                    <strong>resi:</strong>
                                    {{ $transaksi->transaksi_data->resi ?? '-' }}
                                </div>
                            </div>
                        </div>
                        <!-- Rincian Pembayaran -->
                        <div class="row mt-4">
                            <div class="card p-3">
                                <h6 class="border-bottom pb-2 mb-3">Rincian Pembayaran</h6>
                                <div class="mb-2">
                                    <strong>Subtotal:</strong> Rp.
                                    {{ number_format($transaksi->total_harga - $transaksi->transaksi_data->shiping_cost, 0, ',', '.') }}
                                </div>
                                <div class="mb-2">
                                    <strong>Biaya Pengiriman:</strong> Rp.
                                    {{ number_format($transaksi->transaksi_data->shiping_cost, 0, ',', '.') }}
                                </div>
                                <div class="mt-3">
                                    <strong>Total Keseluruhan:</strong> Rp.
                                    {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <!-- Detail Produk -->
                        <div class="row mt-sm-4 mt-4">
                            <div class="card p-3">
                                <h6 class="border-bottom pb-2 mb-3">Informasi Pemesan</h6>
                                <div class="mb-2">
                                    <strong>Nama:</strong> Rp.
                                    {{ $transaksi->user->name }}
                                </div>
                                <div class="mb-2">
                                    <strong>Alamat:</strong> Rp.
                                    <span class="text-wrap">{{ $transaksi->transaksi_data->alamat->kelurahan }},
                                        {{ $transaksi->transaksi_data->alamat->kecamatan }},
                                        {{ $transaksi->transaksi_data->alamat->kabupaten }},
                                        {{ $transaksi->transaksi_data->alamat->provinsi }},
                                        {{ $transaksi->transaksi_data->alamat->kode_pos }}</span>
                                </div>
                                <div class="mb-2">
                                    <strong>Nomor HP:</strong> Rp.
                                    {{ $transaksi->transaksi_data->alamat->no_hp }}
                                </div>
                            </div>
                        </div>

                        <div class="row mt-sm-4 mt-4">
                            <div class="card p-3">
                                <h6 class="border-bottom pb-2 mb-3">Update Resi</h6>
                                <form action="{{ route('admin.pengiriman.edit', $transaksi->id) }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="resi" class="form-label">Resi</label>
                                        <textarea name="resi" id="resi" class="form-control" placeholder="Catatam Pembayaran" rows="3"></textarea>
                                    </div>
                                    @error('resi')
                                        <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                                    @enderror
                                    <button type="submit" class="btn btn-dark text-white">update</button>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
