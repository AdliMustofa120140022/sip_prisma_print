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

        <div class="container mx-auto p-4">

            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold">Pesanan Selesai</h2>
                    <a href="#" class="text-blue-500 hover:underline">Detail</a>
                </div>
                <p class="text-sm text-gray-500 mb-4">Terkirim pada 19 Juli 2024, Anda dapat meminta pengembalian
                    barang/dana hingga 21 Juli 2024</p>

                <div class="mb-6">
                    <h3 class="text-base font-semibold mb-2">Alamat Pengiriman</h3>
                    <p>Adli Mustofa<br>
                        (+62)81212999288<br>
                        Desa Madukoro, Kec. Kotabumi Utara, Kab. Lampung Utara<br>
                        Provinsi Lampung, Indonesia Kode Pos 34552
                    </p>
                </div>

                <table class="w-full border-collapse border border-gray-300 mb-6">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-2 px-4 border border-gray-300">Pesanan</th>
                            <th class="py-2 px-4 border border-gray-300">Harga Barang</th>
                            <th class="py-2 px-4 border border-gray-300">Jumlah</th>
                            <th class="py-2 px-4 border border-gray-300">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border border-gray-300">
                                Undangan Pernikahan Model 012A
                                <a href="#" class="text-blue-500 hover:underline text-xs">Detail Pesanan</a>
                            </td>
                            <td class="py-2 px-4 border border-gray-300">Rp. 100.000</td>
                            <td class="py-2 px-4 border border-gray-300">1</td>
                            <td class="py-2 px-4 border border-gray-300">Rp. 100.000</td>
                        </tr>
                    </tbody>
                </table>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <h3 class="text-base font-semibold mb-2">Ringkasan Pesanan</h3>
                        <ul class="list-none">
                            <li>Sub Total: Rp100.000</li>
                            <li>Biaya Pengiriman: Rp0</li>
                            <li>Biaya Layanan Pembeli: Rp0</li>
                            <li>Diskon: -Rp0</li>
                            <li class="font-bold">Total Pesanan: Rp100.000</li>
                        </ul>
                        <p class="mt-2 font-semibold text-green-500">Status Pembayaran: Lunas</p>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold mb-2">Informasi Pesanan</h3>
                        <ul class="list-none">
                            <li>Nomor Pesanan: PPU6225991817</li>
                            <li>Tanggal Pesanan: 2024-09-03 14:51:12</li>
                            <li>Metode Pembayaran: Bank BCA</li>
                            <li>Waktu Pembayaran: 2024-09-03 14:52:03</li>
                            <li>Metode Pengiriman: J&T Express</li>
                            <li>Nomor Pelacakan: JX232488488488</li>
                            <li>Tanggal Pengantaran: 2024-09-05 08:20:04</li>
                            <li>Tanggal Penerimaan: 2024-09-08 08:20:04</li>
                        </ul>
                    </div>
                </div>

                <div class="flex flex-wrap gap-4">
                    <button class </div>
                </div>
</x-guest-layout>
