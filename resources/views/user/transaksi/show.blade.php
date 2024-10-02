<x-guest-layout>
    <x-slot name="title">Riwayat transaksi</x-slot>

    <x-slot name="head">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" />
    </x-slot>

    <div class="mx-auto w-full px-1 2xl:px-0">
        <div class="flex gap-3 items-center">
            <a href="{{ url()->previous() }}">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Riwayat Transaksi</h2>
        </div>

        <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-md">
            {{-- section 1 --}}
            <div class="mb-6">
                <div class="justify-between items-center">
                    <h2 class="text-lg font-semibold">Alamat Pengiriman</h2>
                    <p class="text-gray-600">{{ $transaksi->transaksi_data->alamat->nama_penerima }}</p>
                    <p class="text-gray-600">{{ $transaksi->transaksi_data->alamat->no_hp }}</p>
                    <p class="text-gray-600">{{ $transaksi->transaksi_data->alamat->kelurahan }},
                        {{ $transaksi->transaksi_data->alamat->kecamatan }},
                        {{ $transaksi->transaksi_data->alamat->kabupaten }},
                        {{ $transaksi->transaksi_data->alamat->provinsi }},
                        {{ $transaksi->transaksi_data->alamat->kode_pos }}</p>
                </div>
            </div>

            <!-- Daftar Pesanan -->
            <div class="mb-6 border-t pt-4">
                <h2 class="text-lg font-semibold">Pesanan</h2>


                @foreach ($transaksi->produk_transaksi as $produk_transaksi)
                    <!-- Pesanan card -->
                    <div class="flex justify-between items-center border-b pb-4">
                        <div>
                            <p class="font-semibold">{{ $produk_transaksi->produck->name }}</p>
                            {{-- <a href="{{ route('user.checkout.product_detail', ['id' => $produk_transaksi->id, 'origin' => request()->fullUrl()]) }}"
                                class="{{ $produk_transaksi->doc_pendukung ? 'text-blue-600' : 'text-red-600' }} text-sm">{{ $produk_transaksi->doc_pendukung ? 'Detail produk' : 'Tambah Detail produk' }}</a> --}}
                        </div>

                        <div class="flex items-center space-x-12">
                            <div class="text-center">
                                <p class="font-semibold">Harga Barang</p>
                                <p class="text-blue-500">Rp.
                                    {{ number_format($produk_transaksi->produck->data_produck->harga_satuan, 0, ',', '.') }}
                                </p>
                            </div>

                            <div class="px-3">
                                <p class="font-bold text-base">Jumlah</p>
                                <p class="text-center font-semibold">{{ $produk_transaksi->jumlah }}</p>
                            </div>

                            <div class="text-center">
                                <p class="font-semibold">Total Harga</p>
                                <p class="text-blue-500">Rp.
                                    {{ number_format($produk_transaksi->produck->data_produck->harga_satuan * $produk_transaksi->jumlah, 0, ',', '.') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Ringkasan Pesanan -->
            <div class="mb-6 pt-4">
                <h2 class="text-lg font-semibold mb-4">Ringkasan Pesanan</h2>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span>Sub Total</span>
                        <span>Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Biaya Pengiriman</span>
                        {{-- <span>Rp. {{ number_format($transaksi->transaksi_data->shiping_cost, 0, ',', '.') }}</span> --}}
                        <span>Rp100.000</span>
                    </div>
                    <div class="flex justify-between font-semibold">
                        <span>Total Pesanan</span>
                        <span>Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <!-- Informasi Pesanan -->
            <div class="mb-6 border-t pt-4">
                <h2 class="text-lg font-semibold mb-4">Informasi Pesanana</h2>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span>Nomor Pesanan</span>
                        <span>{{ $transaksi->transaksi_code }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Tanggal Pesanan</span>
                        <span>{{ $transaksi->created_at }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Metode Pembayaran</span>
                        <span>{{ $transaksi->transaksi_data->payment_metode->name }}</span>
                    </div>
                    <div class="flex justify-between ">
                        <span>Waktu Pembayaran</span>
                        <span>{{ $transaksi->transaksi_data->payment_time ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Metode Pengiriman</span>
                        <span>{{ $transaksi->transaksi_data->metode_pengiriman }}</span>
                    </div>
                    <div class="flex justify-between ">
                        <span>Nomor Resi</span>
                        <span>{{ $transaksi->transaksi_data->resi ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between ">
                        <span>Tanggal Pengiriman</span>
                        <span>{{ $transaksi->transaksi_data->shiping_time ?? '-' }}</span>
                    </div>
                    @if ($transaksi->status == 'selesai')
                        <div class="flex justify-between ">
                            <span>Tanggal Penerimaan</span>
                            <span>{{ $transaksi->transaksi_data->shiping_done_time ?? '-' }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex flex-col items-center justify-center">
                <div class="space-x-4">
                    <!-- Download Invoice Button -->
                    <a href=""
                        class="px-4 py-2 text-blue-600 bg-blue-100 border border-blue-400 rounded-md hover:bg-blue-200">
                        Download Invoice
                    </a>

                    <!-- Download Surat Pesanan Button -->
                    <a href=""
                        class="px-4 py-2 text-yellow-600 bg-yellow-100 border border-yellow-400 rounded-md hover:bg-yellow-200">
                        Download Surat Pesanan
                    </a>
                    @if ($transaksi->status == 'kirim')
                        <!-- Ajukan Retur Button -->
                        <a href=""
                            class="px-4 py-2 text-red-600 bg-red-100 border border-red-400 rounded-md hover:bg-red-200">
                            Ajukan Retur
                        </a>
                    @endif

                    <!-- Download Berita Acara Serah Terima Button -->
                    @if ($transaksi->status == 'selesai')
                        <a href=""
                            class="px-4 py-2 text-green-600 bg-green-100 border border-green-400 rounded-md hover:bg-green-200">
                            Download Berita Acara Serah Terima
                        </a>
                    @endif
                </div>

                <!-- Pesanan Selesai Button (Full Width) -->
                <div class="flex justify-center mt-6">
                    <button
                        class="w-full max-w-md px-40 py-2 text-green-600 bg-green-100 border border-green-400 rounded-md hover:bg-green-200">
                        Pesanan Selesai
                    </button>
                </div>
            </div>
        </div>
</x-guest-layout>
