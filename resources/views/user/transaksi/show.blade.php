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
                    <p class="text-gray-600">Aldi Mustafa</p>
                    <p class="text-gray-600">(+62) 81212992988</p>
                    <p class="text-gray-600">Desa Madukoro, Kec. Kotabumi Utara, Kab. Lampung Utara, Provinsi Lampung,
                        Indonesia, 34552</p>
                </div>
            </div>

            <!-- Daftar Pesanan -->
            <div class="mb-6 border-t pt-4">
                <h2 class="text-lg font-semibold">Pesanan</h2>

                <!-- Pesanan card -->
                <div class="flex justify-between items-center border-b pb-4">
                    <div>
                        <p class="font-semibold">Undangan Pernikahan Model 012A</p>
                        <a href="#" class="text-blue-500 text-sm">Detail Pesanan</a>
                    </div>

                    <div class="flex items-center space-x-12">
                        <div class="text-center">
                            <p class="font-semibold">Harga Barang</p>
                            <p class="text-blue-500">Rp. 100.000</p>
                        </div>

                        <div class="px-3" x-data="{ counter: 2 }">
                            <p class="font-bold text-base">Jumlah</p>
                            <div class="flex items-center">
                                <button type="button" id="decrement-button"
                                    class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                                    @click="counter <= 0 ? counter = 0 : counter--">
                                    <i class="fa-solid fa-minus text-white"></i>
                                </button>
                                <input type="text" id="counter-input" x-model="counter"
                                    class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 "
                                    required />
                                <button type="button" id="increment-button" @click="counter++"
                                    class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                    <i class="fa-solid fa-plus text-white"></i>
                                </button>
                            </div>
                        </div>

                        <div class="text-center">
                            <p class="font-semibold">Total Harga</p>
                            <p class="text-blue-500">Rp. 100.000</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ringkasan Pesanan -->
            <div class="mb-6 pt-4">
                <h2 class="text-lg font-semibold mb-4">Ringkasan Pesanan</h2>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span>Sub Total</span>
                        <span>Rp100.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Biaya Pengiriman</span>
                        <span>Rp0</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Biaya Layanan Pembeli</span>
                        <span>Rp0</span>
                    </div>
                    <div class="flex justify-between font-semibold">
                        <span>Total Pesanan</span>
                        <span>Rp100.000</span>
                    </div>
                </div>
            </div>

            <!-- Informasi Pesanan -->
            <div class="mb-6 border-t pt-4">
                <h2 class="text-lg font-semibold mb-4">Informasi Pesanana</h2>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span>Nomor Pesanan</span>
                        <span>Rp100.000</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Tanggal Pesanan</span>
                        <span>Rp0</span>
                    </div>
                    <div class="flex justify-between">
                        <span>MEtode Pembayaran</span>
                        <span>Rp0</span>
                    </div>
                    <div class="flex justify-between ">
                        <span>Waktu Pembayaran</span>
                        <span>-Rp0</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Metode Pengiriman</span>
                        <span>Rp0</span>
                    </div>
                    <div class="flex justify-between ">
                        <span>Nomor Resi</span>
                        <span>-Rp0</span>
                    </div>
                    <div class="flex justify-between ">
                        <span>Tanggal Pengiriman</span>
                        <span>-Rp0</span>
                    </div>
                    <div class="flex justify-between ">
                        <span>Tanggal Penerimaan</span>
                        <span>-Rp0</span>
                    </div>
                </div>
            </div>

            <!-- Tombol -->
            <div class="grid grid-cols-3 gap-5 px-10">

                <x-utils.btn-href text="Kembali" target:="#" class="bg-gray-500" />
                <x-utils.btn-href text="Kembali" target:="#" class="bg-gray-500" />
                <x-utils.btn-href text="Kembali" target:="#" class="bg-gray-500" />
                <x-utils.btn-href text="Kembali" target:="#" class="bg-gray-500" />
                <x-utils.btn-href text="Kembali" target:="#" class="bg-gray-500" />
            </div>
        </div>
</x-guest-layout>
