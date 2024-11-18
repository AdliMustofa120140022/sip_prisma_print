<button type="button" class="text-secondary font-weight-bold text-decoration-underline pe-3 bg-transparent border-0"
    data-bs-toggle="modal" data-bs-target="#modaldetail{{ $transaksi->id }}">
    Detail
</button>


<div class="modal fade" id="modaldetail{{ $transaksi->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modaldetailLabel{{ $transaksi->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaldetailLabel{{ $transaksi->id }}">Detail Payment</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container row justify-content-center ">
                    <!-- Informasi Transaksi -->
                    <div class="col-md-6">

                        <div class="card p-3">
                            <h6 class="border-bottom pb-2 mb-3">Informasi Transaksi</h6>
                            <div class="mb-2">
                                <strong>ID Transaksi:</strong> {{ $transaksi->transaksi_code }}
                            </div>
                            <div class="mb-2">
                                <strong>Tanggal Transaksi:</strong> {{ $transaksi->created_at->format('d M Y, H:i') }}
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
                                @if ($transaksi->transaksi_data->payment_status == 'unpaid')
                                    <span class="badge bg-danger">Belum Dibayar</span>
                                @elseif ($transaksi->transaksi_data->payment_status == 'pending')
                                    <span class="badge bg-warning text-dark">Menunggu Persetujuan</span>
                                @elseif($transaksi->transaksi_data->payment_status == 'approved')
                                    <span class="badge bg-success">Disetujui</span>
                                @elseif($transaksi->transaksi_data->payment_status == 'rejected')
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-sm-4 mt-md-0">
                        <div class="card p-3">
                            <!-- Detail Produk -->
                            <h6 class="border-bottom pb-2 mb-3">Detail Produk</h6>
                            @if ($transaksi->tansaktion_type != 'costume')
                                @foreach ($transaksi->produk_transaksi as $produk_transaksi)
                                    <div class="mb-2">
                                        <strong>{{ $produk_transaksi->produck->name }}</strong> - Rp.
                                        {{ number_format($produk_transaksi->produck->data_produck->harga_satuan, 0, ',', '.') }}
                                        x
                                        {{ $produk_transaksi->jumlah }}
                                    </div>
                                @endforeach
                            @else
                                <div class="mb-2">
                                    <strong>(Kostum)</strong>
                                    <strong>{{ $transaksi->costume_transaksi->product_name }}</strong> - Rp.
                                    {{ number_format($transaksi->costume_transaksi->price, 0, ',', '.') }}
                                    x
                                    {{ $transaksi->costume_transaksi->order_quantity }}
                                </div>
                            @endif
                            <div class="mt-3">
                                <strong>Total Harga:</strong> Rp.
                                {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-11 mt-6">
                        <div class="card p-3">
                            <!-- Rincian Pembayaran -->
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
            </div>

        </div>
    </div>
</div>
