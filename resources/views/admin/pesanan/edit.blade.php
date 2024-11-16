<button type="button" class="text-secondary font-weight-bold text-decoration-underline pe-3 bg-transparent border-0"
    data-bs-toggle="modal" data-bs-target="#modelEdit{{ $transaksi->id }}">
    Update
</button>


<div class="modal fade" id="modelEdit{{ $transaksi->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalEditLabel{{ $transaksi->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel{{ $transaksi->id }}">
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
                                            Proses Pembayaran
                                        </span>
                                    @elseif($transaksi->status == 'desain')
                                        <span class=" text-primary text-center font-weight-bold">
                                            Proses Desain
                                        </span>
                                    @elseif($transaksi->status == 'cetak')
                                        <span class=" text-primary text-center font-weight-bold">
                                            Proses Cetak
                                        </span>
                                    @elseif($transaksi->status == 'kirim')
                                        <span class=" text-primary text-center font-weight-bold">
                                            Proses Pengiriman
                                        </span>
                                    @elseif($transaksi->status == 'selesai')
                                        <span class=" text-succes text-center font-weight-bold">
                                            Pesanan Selesai
                                        </span>
                                    @elseif($transaksi->status == 'gagal')
                                        <span class=" text-danger text-center font-weight-bold">
                                            Pesanan Gagal
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
                                    <strong>Resi:</strong>
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
                                @if ($transaksi->tansaktion_type != 'costume')
                                    @foreach ($transaksi->produk_transaksi as $produk_transaksi)
                                        <div class="mb-2">
                                            <strong>{{ $produk_transaksi->produck->name }}</strong> - Rp.
                                            {{ number_format($produk_transaksi->produck->harga_satuan, 0, ',', '.') }}
                                            x
                                            {{ $produk_transaksi->jumlah }}
                                        </div>
                                    @endforeach
                                @else
                                    <div class="mb-2">
                                        <strong>(Pesanan Kustom)</strong>
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

                        <div class="row mt-sm-4 mt-4">
                            <div class="card p-3">
                                <h6 class="border-bottom pb-2 mb-3">Informasi Pemesan</h6>
                                <div class="mb-2">
                                    <strong>Nama:</strong>
                                    {{ $transaksi->user->name }}
                                </div>
                                <div class="mb-2">
                                    <strong>Alamat:</strong>
                                    <span class="text-wrap">{{ $transaksi->transaksi_data->alamat->kelurahan }},
                                        {{ $transaksi->transaksi_data->alamat->kecamatan }},
                                        {{ $transaksi->transaksi_data->alamat->kabupaten }},
                                        {{ $transaksi->transaksi_data->alamat->provinsi }},
                                        {{ $transaksi->transaksi_data->alamat->kode_pos }}</span>
                                </div>
                                <div class="mb-2">
                                    <strong>Nomor HP:</strong>
                                    {{ $transaksi->transaksi_data->alamat->no_hp }}
                                </div>
                            </div>
                        </div>

                        <div class="row mt-sm-4 mt-4">
                            <div class="card p-3">
                                <h6 class="border-bottom pb-2 mb-3">Update Status Pesanan</h6>
                                <form action="{{ route('admin.pesanan.update', $transaksi->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    @csrf
                                    <label for="update_status">Update Status</label>
                                    <select name="update_status" id="update_status" class="form-control mb-4">
                                        <option value="payment"
                                            {{ $transaksi->status == 'payment' ? 'selected' : '' }}>
                                            Proses Pembayaran
                                        </option>
                                        <option value="desain" {{ $transaksi->status == 'desain' ? 'selected' : '' }}>
                                            Proses Desain
                                        </option>
                                        <option value="cetak" {{ $transaksi->status == 'cetak' ? 'selected' : '' }}>
                                            Proses Cetak
                                        </option>
                                        <option value="kirim" {{ $transaksi->status == 'kirim' ? 'selected' : '' }}>
                                            Proses Pengiriman
                                        </option>
                                        <option value="selesai"
                                            {{ $transaksi->status == 'selesai' ? 'selected' : '' }}>
                                            Pesanan Selesai
                                        </option>
                                        <option value="gagal" {{ $transaksi->status == 'gagal' ? 'selected' : '' }}>
                                            Pesanan Gagal
                                        </option>
                                    </select>


                                    <button type="submit" class="btn bg-dark text-white">Update</button>
                                </form>
                            </div>
                        </div>

                    </div>


                </div>

            </div>

        </div>
    </div>
</div>
