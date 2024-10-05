<button type="button" class="text-secondary font-weight-bold text-decoration-underline pe-3 bg-transparent border-0"
    data-bs-toggle="modal" data-bs-target="#modelDetail{{ $transaksi->id }}">
    detail
</button>


<div class="modal fade" id="modelDetail{{ $transaksi->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalDetailLabel{{ $transaksi->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel{{ $transaksi->id }}">
                    Update Status Pesanan</h5>
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
                                    <strong>Status Transaksi:</strong>
                                    @if ($transaksi->status == 'payment')
                                        <span class=" text-warning text-center font-weight-bold">
                                            Prses Pembayaran
                                        </span>
                                    @elseif($transaksi->status == 'desain')
                                        <span class=" text-primary text-center font-weight-bold">
                                            Desain
                                        </span>
                                    @elseif($transaksi->status == 'cetak')
                                        <span class=" text-primary text-center font-weight-bold">
                                            cetak
                                        </span>
                                    @elseif($transaksi->status == 'kirim')
                                        <span class=" text-primary text-center font-weight-bold">
                                            kirim
                                        </span>
                                    @elseif($transaksi->status == 'selesai')
                                        <span class=" text-succes text-center font-weight-bold">
                                            selesai
                                        </span>
                                    @elseif($transaksi->status == 'gagal')
                                        <span class=" text-danger text-center font-weight-bold">
                                            gagal
                                        </span>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <strong>Jumlah Pembayaran:</strong> Rp.
                                    {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                                </div>
                                <div class="mb-2">
                                    <strong>Metode Pembayaran:</strong>
                                    {{ $transaksi->transaksi_data->payment_metode->name }}
                                </div>
                                <div class="mb-2">
                                    <strong>Status Pembayaran:</strong>
                                    @if ($transaksi->status != 'gagal')
                                        @if ($transaksi->transaksi_data->payment_status == 'unpaid')
                                            <span class="badge bg-danger">Belum Dibayar</span>
                                        @elseif ($transaksi->transaksi_data->payment_status == 'pending')
                                            <span class="badge bg-warning text-dark">Menunggu Persetujuan</span>
                                        @elseif($transaksi->transaksi_data->payment_status == 'approved')
                                            <span class="badge bg-success">Disetujui</span>
                                        @elseif($transaksi->transaksi_data->payment_status == 'rejected')
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    @else
                                        <span class="badge bg-success">-</span>
                                    @endif

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
                        <div class="row mt-sm-4 mt-md-0">
                            <div class="card p-3">
                                <h6 class="border-bottom pb-2 mb-3">Detail Produk</h6>
                                @foreach ($transaksi->produk_transaksi as $produk_transaksi)
                                    <div class="mb-2">
                                        <strong>{{ $produk_transaksi->produck->name }}</strong> - Rp.
                                        {{ number_format($produk_transaksi->produck->harga_satuan, 0, ',', '.') }} x
                                        {{ $produk_transaksi->jumlah }}
                                    </div>
                                @endforeach
                                <div class="mt-3">
                                    <strong>Total Harga:</strong> Rp.
                                    {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>

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

                    </div>





                    <!-- Bukti Pembayaran -->
                    {{-- <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header pb-0">
                                <h6>Bukti Pembayaran</h6>
                            </div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <img src="{{ asset('storage/bukti_pembayaran/' . $transaksi->transaksi_data->bukti_pembayaran) }}"
                                    class="img-fluid rounded shadow" alt="bukti pembayaran">
                            </div>
                        </div>
                    </div> --}}
                </div>

            </div>

        </div>
    </div>
</div>
