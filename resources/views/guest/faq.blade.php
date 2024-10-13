<x-guest-layout>

    <x-slot name="title">FAQ</x-slot>

    <section class="title px-4 md:px-0 uppercase font-bold text-5xl py-5 ">
        <h1>FAQ</h1>
    </section>

    <section class="flex gap-5 px-4 md:px-0 relative">
        <x-faq-sidebar :param='$param' />

        {{-- pemesanan --}}
        <div class=" w-full mt-12 lg:mt-0 ">
            @if ($param == 'cara_pemesanan')
                <p class="font-semibold text-2xl">Pemesanan</p>
                <div class="p-3 border rounded-md w-full">
                    <p class="font-semibold">Bagaimana cara melakukan pemesanan?</p>
                    <div class=" ps-4 py-2 w-full text-gray-600">
                        <p>Anda bisa melakukan pemesanan melalui website kami dengan mengikuti langkah-langkah berikut:
                        </p>
                        <p>1. Pilih produk yang Anda inginkan.</p>
                        <p>2. Klik "Tambah ke Keranjang".</p>
                        <p>3. Setelah selesai memilih produk, klik ikon keranjang belanja dan lanjutkan ke checkout.</p>
                        <p>4. Isi informasi pengiriman dan pilih metode pembayaran.</p>
                        <p>5. Klik "Konfirmasi Pesanan" untuk menyelesaikan pemesanan.</p>
                    </div>
                </div>
            @elseif ($param == 'contoh_produk')
                <p class="font-semibold text-2xl">Pemesanan</p>
                <div class="p-3 border rounded-md w-full">
                    <p class="font-semibold">Apakah saya bisa melihat contoh produk sebelum memesan dalam jumlah besar?
                    </p>
                    <div class=" ps-4 py-2 w-full text-gray-600">
                        <ul class="list-disc ml-5 text-gray-700">
                            <li>
                                Ya, Anda dapat meminta sampel produk sebelum melakukan pemesanan dalam jumlah besar.
                                Silakan hubungi layanan pelanggan kami untuk informasi lebih lanjut.
                            </li>
                        </ul>
                    </div>
                </div>
            @elseif ($param == 'desain_sendiri')
                <p class="font-semibold text-2xl">Pemesanan</p>
                <div class="p-3 border rounded-md w-full">
                    <p class="font-semibold">Apakah saya bisa membuat desain sendiri untuk produk yang saya pesan?</p>
                    <div class=" ps-4 py-2 w-full text-gray-600">
                        <ul class="list-disc ml-5 text-gray-700">
                            <li>
                                Ya, Anda dapat mengunggah desain Anda sendiri untuk produk yang dipesan. Pastikan file
                                desain sesuai dengan spesifikasi yang tertera di halaman produk.
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- @elseif ($param == 'diskon_jumlah_besar')

                <p class="font-semibold text-2xl">Pemesanan</p>
                <div class="p-3 border rounded-md w-full">
                    <p class="font-semibold">Apakah ada diskon untuk pemesanan dalam jumlah besar?</p>
                    <div class=" ps-4 py-2 w-full text-gray-600">
                        <ul class="list-disc ml-5 text-gray-700">
                            <li>
                                Ya, kami menawarkan diskon untuk pemesanan dalam jumlah besar. Silakan hubungi tim sales
                                kami untuk mendapatkan penawaran khusus.
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}

                {{-- Pembayaran --}}
            @elseif ($param == 'metode_pembayaran')
                <p class="font-semibold text-2xl">Pembayaran</p>
                <div class="p-3 border rounded-md w-full">
                    <p class="font-semibold">Apa saja metode pembayaran yang diterima?</p>
                    <div class=" ps-4 py-2 w-full text-gray-600">
                        <p>Kami menerima berbagai metode pembayaran, termasuk:</p>
                        <ul class="list-disc ml-5 text-gray-700">
                            <li>
                                Transfer Bank
                            </li>
                            <li>
                                E-Wallet (OVO, GoPay, Dana)
                            </li>
                        </ul>
                    </div>
                </div>


                {{-- Pengiriman --}}
            @elseif ($param == 'waktu_cetak')
                <p class="font-semibold text-2xl">Pengiriman</p>
                <div class="p-3 border rounded-md w-full">
                    <p class="font-semibold">Berapa lama waktu yang dibutuhkan untuk proses cetak?</p>
                    <div class=" ps-4 py-2 w-full text-gray-600">
                        <ul class="list-disc ml-5 text-gray-700">
                            <li>
                                Waktu proses cetak tergantung pada jenis dan jumlah pesanan. Biasanya, pesanan standar
                                memerlukan waktu 3-5 hari kerja, sementara pesanan kustom atau dalam jumlah besar bisa
                                memakan waktu lebih lama. Kami akan memberikan estimasi waktu yang lebih akurat setelah
                                Anda melakukan pemesanan.
                            </li>
                        </ul>
                    </div>
                </div>
            @elseif ($param == 'melacak_pesanan')
                <p class="font-semibold text-2xl">Pengiriman</p>
                <div class="p-3 border rounded-md w-full">
                    <p class="font-semibold">Bagaimana cara melacak pesanan saya?</p>
                    <div class=" ps-4 py-2 w-full text-gray-600">
                        <ul class="list-disc ml-5 text-gray-700">
                            <li>
                                Anda dapat melacak status pesanan Anda melalui halaman "Pesanan Sedang Diproses" pada
                                halaman pesanan di website kami.
                            </li>
                        </ul>
                    </div>
                </div>
            @elseif ($param == 'biaya_pengiriman')
                <p class="font-semibold text-2xl">Pengiriman</p>
                <div class="p-3 border rounded-md w-full">
                    <p class="font-semibold">Apakah ada biaya pengiriman?</p>
                    <div class=" ps-4 py-2 w-full text-gray-600">
                        <ul class="list-disc ml-5 text-gray-700">
                            <li>
                                Biaya pengiriman tergantung pada lokasi pengiriman dan berat pesanan. Biaya pengiriman
                                akan ditampilkan saat checkout sebelum Anda menyelesaikan pemesanan.
                            </li>
                        </ul>
                    </div>
                </div>


                {{-- kebijana  dan garansi --}}
            @elseif ($param == 'garansi_cetakan')
                <p class="font-semibold text-2xl">Kebijakan & Garansi</p>
                <div class="p-3 border rounded-md w-full">
                    <p class="font-semibold">Apakah ada garansi untuk produk cetakan?</p>
                    <div class=" ps-4 py-2 w-full text-gray-600">
                        <ul class="list-disc ml-5 text-gray-700">
                            <li>
                                Ya, kami memberikan garansi untuk setiap produk cetakan. Jika ada kesalahan cetak atau
                                produk yang diterima tidak sesuai dengan pesanan, silakan hubungi layanan pelanggan kami
                                dalam waktu 7 hari setelah menerima produk untuk penggantian atau pengembalian dana.
                            </li>
                        </ul>
                    </div>
                </div>


                {{-- Layanan Pelanggan --}}
            @elseif ($param == 'hubungi_layanan_pelanggan')
                <p class="font-semibold text-2xl">Layanan Pelanggan</p>
                <div class="p-3 border rounded-md w-full">
                    <p class="font-semibold">Bagaimana cara menghubungi layanan pelanggan?</p>
                    <div class=" ps-4 py-2 w-full text-gray-600">
                        <p class="mb-2">Anda dapat menghubungi layanan pelanggan kami melalui:</p>
                        <ul class="list-disc ml-5 text-gray-700 mb-4">
                            <li>Telepon: (021) 123-4567</li>
                            <li>Email: perc.primaprinting@gmail.com</li>
                            <li>WhatsApp: 0813-7931-7635 <br> 0812-7964-966</li>
                        </ul>
                        <ul class="list-disc ml-5 text-gray-700">
                            <li>
                                Alamat Cabang Madukoro, Kotabumi Utara <br>
                                Jl. Tabak No.09, Madukoro, Kec. Kotabumi Utara, Kabupaten Lampung Utara, Lampung 34511
                                <br>
                                <a href="#" class="text-blue-600">Lihat di Google Maps</a>
                            </li>
                            <li class="mt-2">
                                Alamat Cabang Cempaka, Sungkai Jaya <br>
                                Pasar Cempaka, Cempaka, Kec. Sungkai Jaya, Kabupaten Lampung Utara, Lampung 34554 <br>
                                <a href="#" class="text-blue-600">Lihat di Google Maps</a>
                            </li>
                        </ul>
                    </div>
            @endif

            {{--
            <p class="font-semibold text-2xl">Pemesanan</p>
            <div class="p-3 border rounded-md w-full">
                <p class="font-semibold">Bagaimana</p>
                <div class=" ps-4 py-2 w-full text-gray-600">
                    <p>Anda</p>

                </div>
            </div>
        </div> --}}


    </section>


</x-guest-layout>
