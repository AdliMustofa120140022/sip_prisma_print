<x-guest-layout>
    <x-slot name="title">Detai transaksi</x-slot>

    <x-slot name="head">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" />
    </x-slot>

    <div class="mx-auto w-full px-1 2xl:px-0">
        <div class="flex gap-3 items-center">
            <a href="{{ url()->previous() }}">
                <i class="fa-solid fa-arrow-left text-lg px-3"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Detail Transaksi</h2>
        </div>

        <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-md">
            {{-- status --}}
            @if ($transaksi->status != 'selesai' && $transaksi->status != 'gagal')
                <div class="border-b-4 border-gray-400 bg-gray-100 py-3 p px-10">
                    <h2 class="text-xl font-bold">Sedang Dalam Proses</h2>
                    <p class="text-gray-700 font-semibold">Sedang Dalam Proses {{ $transaksi->status }}</p>
                </div>
            @elseif ($transaksi->status == 'gagal')
                <div class="border-b-4 border-red-400 bg-red-100 py-3 p px-10">
                    <h2 class="text-xl font-bold">Gagal</h2>
                    <p class="text-red-700 font-semibold">Transaksi Gagal
                        {{ $transaksi->transaksi_data->payment_note }}</p>
                </div>
            @elseif ($transaksi->status == 'selesai')
                <div class="border-b-4 border-green-400 bg-green-100 py-3 p px-10">
                    <h2 class="text-xl font-bold">Selesai</h2>
                    <p class="text-green-700 font-semibold">Transaksi Selesai</p>
                </div>
            @endif

            @if ($transaksi->status == 'return' || $transaksi->return_transaksi != null)
                <div class="border-b-4 mt-4 py-3 p px-10">
                    <h2 class="text-xl font-bold">Pengajuan Return</h2>
                    <div class="grid grid-cols-3 gap-8 py-2">
                        <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                            Return Status
                        </label>
                        <div class="col-span-2 space-y-4">
                            @if ($transaksi->return_transaksi->status == 'pending')
                                <span
                                    class="px-3 py-1 my-2 rounded-full text-wrap text-sm font-semibold bg-orange-100 text-orange-600">
                                    Menunggu Persetujuan
                                </span>
                            @elseif($transaksi->return_transaksi->status == 'approved')
                                <span
                                    class="px-3 py-1 my-2 rounded-full text-wrap text-sm font-semibold bg-green-100 text-green-600">
                                    Disetujui
                                </span>
                            @elseif($transaksi->return_transaksi->status == 'rejected')
                                <span
                                    class="px-3 py-1 my-2 rounded-full text-wrap text-sm font-semibold bg-red-100 text-red-600">
                                    Ditolak
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-8 ">
                        <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                            Alasan Return
                        </label>
                        <div class="col-span-2 space-y-4">
                            <span>{{ $transaksi->return_transaksi->alasan }}</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-8 ">
                        <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                            Bukti return
                        </label>
                        <div class="col-span-2 space-y-4">
                            <a href="{{ asset('storage/bukti_return/' . $transaksi->return_transaksi->bukti) }}"
                                class="font-semibold text-blue-800" download>
                                <span>Download Bukti</span>
                            </a>
                        </div>
                    </div>
                    @if ($transaksi->return_transaksi->status == 'rejected')
                        <div class="grid grid-cols-3 gap-8 ">
                            <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                                Alasan Penolakan
                            </label>
                            <div class="col-span-2 space-y-4">
                                <span>{{ $transaksi->return_transaksi->reject_reason }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            @endif

            {{-- section 1 --}}
            <div class="mb-6 ">
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

                @if ($transaksi->tansaktion_type == 'costume')
                    <div class="flex justify-between items-center border-b pb-4">

                        <div>
                            <strong>(Kostum)</strong>
                            <p class="font-semibold">{{ $transaksi->costume_transaksi->product_name }}</p>
                        </div>

                        <div class="flex flex-wrap items-center space-x-12">


                            <div class="px-3">
                                <p class="font-bold text-base">Jumlah</p>
                                <p class="text-center font-semibold">
                                    {{ $transaksi->costume_transaksi->order_quantity }}</p>
                            </div>

                            <div class="text-center">
                                <p class="font-semibold">Total Harga</p>
                                <p class="text-blue-500">Rp.
                                    {{ number_format($transaksi->costume_transaksi->harga, 0, ',', '.') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($transaksi->produk_transaksi as $produk_transaksi)
                        <!-- Pesanan card -->
                        <div class="flex justify-between  border-b pb-4">
                            <div>
                                <p class="font-semibold text-wrap">{{ $produk_transaksi->produck->name }}</p>
                            </div>

                            <div class="flex flex-wrap gap-3 items-center space-x-12">
                                <div class="hidden md:block text-center">
                                    <p class="font-semibold">Harga Barang</p>
                                    <p class="text-blue-500">Rp.
                                        {{ number_format($produk_transaksi->produck->data_produck->harga_satuan, 0, ',', '.') }}
                                    </p>
                                </div>

                                <div class="px-0 md:px-3">
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
                @endif
            </div>

            <!-- Ringkasan Pesanan -->
            <div class="mb-6 pt-4">
                <h2 class="text-lg font-semibold mb-4">Ringkasan Pesanan</h2>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-wrap">Sub Total</span>
                        <span>Rp.
                            {{ number_format($transaksi->total_harga - $transaksi->transaksi_data->shiping_cost, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-wrap">Biaya Pengiriman</span>
                        <span>Rp. {{ number_format($transaksi->transaksi_data->shiping_cost, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between font-semibold">
                        <span class="text-wrap">Total Pesanan</span>
                        <span>Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <!-- Informasi Pesanan -->
            <div class="mb-6 border-t pt-4">
                <h2 class="text-lg font-semibold mb-4">Informasi Pesanana</h2>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-wrap">Nomor Pesanan</span>
                        <div x-data="{ copied: false }" class="flex items-center">
                            <span x-ref="tCode" class="mr-2">{{ $transaksi->transaksi_code ?? '-' }}</span>
                            <button class="px-1"
                                @click='navigator.clipboard.writeText($refs.tCode.textContent); copied = true;  setTimeout(() => copied = false, 5000) '>
                                <i x-show='!copied' class="fa-regular fa-copy"></i>
                                <i x-show='copied' class="fa-solid fa-check"></i>
                            </button>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-wrap">Tanggal Pesanan</span>
                        <span>{{ $transaksi->created_at }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-wrap">Metode Pembayaran</span>
                        <span>{{ $transaksi->transaksi_data->payment_metode->name }}</span>
                    </div>
                    <div class="flex justify-between ">
                        <span class="text-wrap">Waktu Pembayaran</span>
                        <span>{{ $transaksi->transaksi_data->payment_time ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-wrap">Metode Pengiriman</span>
                        <span>{{ $transaksi->transaksi_data->metode_pengiriman }}</span>
                    </div>
                    <div class="flex justify-between ">
                        <span class="text-wrap">Nomor Resi</span>
                        <div x-data="{ copied: false }" class="flex items-center">
                            <span x-ref="resi" class="mr-2">{{ $transaksi->transaksi_data->resi ?? '-' }}</span>
                            <button class="px-1"
                                @click='navigator.clipboard.writeText($refs.resi.textContent); copied = true;  setTimeout(() => copied = false, 5000) '>
                                <i x-show='!copied' class="fa-regular fa-copy"></i>
                                <i x-show='copied' class="fa-solid fa-check"></i>
                            </button>
                        </div>
                    </div>
                    <div class="flex justify-between ">
                        <span class="text-wrap">Tanggal Pengiriman</span>
                        <span>{{ $transaksi->transaksi_data->shiping_time ?? '-' }}</span>
                    </div>
                    @if ($transaksi->status == 'selesai')
                        <div class="flex justify-between ">
                            <span class="text-wrap">Tanggal Penerimaan</span>
                            <span>{{ $transaksi->updated_at ?? '-' }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex flex-col items-center justify-center">
                <div class="space-x-0 md:space-x-4 flex flex-wrap gap-4 justify-center">
                    <!-- Download Invoice Button -->
                    <button type="button"
                        onclick="printContent('{{ route('user.print.inv', $transaksi->transaksi_code) }}')"
                        class="px-4 py-2  text-blue-600 bg-blue-100 border border-blue-400 rounded-md hover:bg-blue-200">
                        Download Invoice
                    </button>

                    <!-- Download Surat Pesanan Button -->
                    <button type="button"
                        onclick="printContent('{{ route('user.print.pesan', $transaksi->transaksi_code) }}')"
                        class="px-4 py-2  text-yellow-600 bg-yellow-100 border border-yellow-400 rounded-md hover:bg-yellow-200">
                        Download Surat Pesanan
                    </button>
                    @if ($transaksi->status == 'kirim')
                        <a href="{{ route('user.return.create', $transaksi->id) }}"
                            class="px-4 py-2  text-red-600 bg-red-100 border border-red-400 rounded-md hover:bg-red-200">
                            Ajukan Retur
                        </a>
                    @endif

                    <!-- Download Berita Acara Serah Terima Button -->
                    {{-- @if ($transaksi->status == 'selesai') --}}
                    <button onclick="printContent('{{ route('user.print.ba', $transaksi->transaksi_code) }}')"
                        class="px-4 py-2 text-wrap text-center text-green-600 bg-green-100 border border-green-400 rounded-md hover:bg-green-200">
                        Download Berita Acara Serah Terima
                    </button>
                    {{-- @endif --}}
                </div>

                <!-- Pesanan Selesai Button (Full Width) -->
                @if ($transaksi->status == 'kirim')
                    <div x-data="{ isOpen: false }">
                        <div class="flex justify-center mt-6">
                            <button type="button" @click="isOpen = true"
                                class="w-full max-w-md px-40 py-2 text-green-600 bg-green-100 border border-green-400 rounded-md hover:bg-green-200">
                                Pesanan Selesai
                            </button>
                        </div>

                        <!-- Modal -->
                        <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-90"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-90"
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                            @click.away="isOpen = false" @keydown.escape.window="isOpen = false"
                            style="display: none;">
                            <div class="bg-white rounded-lg shadow-lg w-96 md:w-1/3 text-center"
                                @click.away="isOpen = false">
                                <div class="p-6" x-data='{isChecked : false}'>
                                    <!-- Modal Header -->
                                    <div class="flex justify-between items-center">
                                        <h3 class="text-lg font-bold">Pernyataan Selesai Pesanan</h3>
                                        <button @click="isOpen = false"
                                            class="text-gray-600 hover:text-gray-900">&times;</button>
                                    </div>


                                    <!-- Modal Body -->
                                    <div class="mt-4 py-4">
                                        <p class="text-gray-600">
                                            Dengan ini saya menyatakan bahwa pesanan saya sudah diterima dengan baik dan
                                            sesuai dengan pesanan yang saya lakukan.
                                        </p>
                                        <p class="text-gray-600 pt-4">
                                            Saya juga menyatakan bahwa saya tidak akan melakukan pengajuan retur barang
                                            tersebut.
                                        </p>
                                        <label class=" py-4 flex items-center space-x-2 mt-4">
                                            <input type="checkbox" class="form-checkbox" x-model="isChecked">
                                            <span class="text-gray-600">
                                                Saya setuju dengan pernyataan diatas
                                            </span>
                                        </label>
                                    </div>

                                    <!-- Modal Footer -->
                                    <div class="flex justify-center mt-6">
                                        <button @click="isOpen = false"
                                            class="bg-red-500 text-white px-4 py-2 text-wrap rounded-lg mr-2">Close</button>
                                        <a href="{{ route('user.transaksi.done', $transaksi->id) }}"
                                            :disabled="!isChecked" class="bg-green-500 text-white px-4 py-2 rounded-lg"
                                            :class="{ 'opacity-50 cursor-not-allowed': !isChecked }">
                                            Selesai
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            function printContent(route) {
                console.log(route);
                fetch(route, {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        const iframe = document.createElement('iframe');
                        iframe.style.display = 'none';
                        document.body.appendChild(iframe);
                        const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
                        iframeDoc.open();
                        iframeDoc.write(html);
                        iframeDoc.close();
                        iframe.onload = () => {
                            iframe.contentWindow.focus();
                            iframe.contentWindow.print();
                            document.body.removeChild(iframe);
                        };

                    });
            }
        </script>
    </x-slot>
</x-guest-layout>
