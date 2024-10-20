<x-app-layout>
    <x-slot name="title">pembayaran</x-slot>
    <x-slot name="metas">

        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    </x-slot>

    <section class="m-3">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="d-flex justify-content-between items-center">
                        <div class="card-header pb-0">
                            <h6>Konfirmasi Pembayaran</h6>
                        </div>

                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="container row justify-content-center ">
                            <!-- Informasi Transaksi -->
                            <div class="col-md-6">

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
                                                {{ number_format($produk_transaksi->produck->harga_satuan, 0, ',', '.') }}
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
                            <div class="col-md-6 mt-6">
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

                                    <h6 class="border-bottom pb-2 mb-3 mt-4">Konfirmasi Pembayaran</h6>
                                    <form action="{{ route('admin.pembayaran.confirm', $transaksi->id) }}"
                                        method="POST">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="status_pembayaran" class="form-label">Status
                                                Pembayaran</label>
                                            <select name="status_pembayaran" id="status_pembayaran"
                                                class="form-control">
                                                <option value="">Konfirmasi pembayaran</option>
                                                <option value="approved">Disetujui</option>
                                                <option value="rejected">Ditolak</option>
                                            </select>
                                        </div>

                                        @error('status_pembayaran')
                                            <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                                        @enderror

                                        <div class="mb-3">
                                            <label for="payment_note" class="form-label">Catatan Pembayaran</label>
                                            <textarea name="payment_note" id="payment_note" class="form-control" placeholder="Catatan Pembayaran" rows="3"></textarea>
                                        </div>
                                        @error('payment_note')
                                            <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                                        @enderror
                                        <button type="submit" class="btn btn-dark text-white">Konfirmasi</button>
                                    </form>
                                </div>
                            </div>

                            <!-- Payment Proof Section -->
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header pb-0">
                                        <h6>Bukti Pembayaran</h6>
                                    </div>
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('storage/bukti_pembayaran/' . $transaksi->transaksi_data->bukti_pembayaran) }}"
                                            class="img-fluid rounded shadow" style="" alt="bukti pembayaran">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="scripts">
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    </x-slot>


</x-app-layout>
