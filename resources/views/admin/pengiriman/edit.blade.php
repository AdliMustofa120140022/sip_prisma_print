<x-app-layout>
    <x-slot name="title">
        Payment
    </x-slot>

    <x-slot name="metas">

    </x-slot>

    <section class="m-3">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="d-flex justify-content-between items-center">
                        <div class="card-header pb-0">
                            <h6>Pengirman</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
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
                                        <h6 class="border-bottom pb-2 mb-3">Update Resi</h6>
                                        <form action="{{ route('admin.pengiriman.edit', $transaksi->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('put')

                                            <div class="mb-3">
                                                <label for="resi" class="form-label">Resi</label>
                                                <textarea name="resi" id="resi" class="form-control" placeholder="Nomor Resi" rows="3"></textarea>
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
    </section>

    <x-slot name="scripts">

    </x-slot>

</x-app-layout>
