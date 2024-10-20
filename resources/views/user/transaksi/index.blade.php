<x-guest-layout>
    <x-slot name="title">Riwayat transaksi</x-slot>

    <x-slot name="head">
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" /> --}}
        <link rel="stylesheet" href="{{ asset('assets/css/datatbel.tailwind.css') }}" />
    </x-slot>

    <div class="mx-auto w-full px-1 2xl:px-0">
        <div class="flex gap-3 items-center">
            <a href="{{ url()->previous() }}">
                <i class="fa-solid fa-arrow-left text-lg px-3"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Riwayat Transaksi</h2>
        </div>

        <div class="container mx-auto p-4 hidden md:block border rounded-lg">
            <div class="flex ">
                <div class=" justify-self-start"></div>
                <div class="justify-self-end"></div>
            </div>

            <table id="TransaksiTable" class="min-w-ful  border-collapse overflow-x-scroll rounded-t-lg">
                <thead class="bg-gray-200">
                    <tr class="rounded-t-lg">
                        <th class="py-3 px-4 text-left text-wrap rounded-tl-lg">No</th>
                        <th class="py-3 px-4 text-left text-wrap">Nomor Pesanan</th>
                        <th class="py-3 px-4 text-left text-wrap">Tanggal Pemesanan</th>
                        <th class="py-3 px-4 text-left text-wrap">Pesanan</th>
                        <th class="py-3 px-4 text-left text-wrap">Status</th>
                        <th class="py-3 px-4 text-left text-wrap">Status Pembayaran</th>
                        <th class="py-3 px-4 text-left text-wrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($transaksis as $transaksi)
                        <tr class="border-t border-gray-300">
                            <td class="px-6 py-6 text-sm text-gray-500">{{ $loop->iteration }}</td>
                            <td class="px-6 py-6 text-sm text-gray-500 text-wrap">{{ $transaksi->transaksi_code }}</td>
                            <td class="px-6 py-6 text-sm text-gray-500 text-wrap">{{ $transaksi->created_at }}</td>
                            <td class="px-6 py-6 text-sm text-gray-500 text-wrap">
                                @if ($transaksi->tansaktion_type != 'costume')
                                    @foreach ($transaksi->produk_transaksi as $produk_transaksi)
                                        {{ $produk_transaksi->produck->name }} ({{ $produk_transaksi->jumlah }}),
                                    @endforeach
                                @else
                                    <span>Custom</span>
                                @endif
                            </td>
                            <td>
                                @if ($transaksi->status == 'make')
                                    <div
                                        class="px-3 py-1 my-2 rounded-md text-wrap text-sm font-semibold text-center bg-gray-100 text-gray-600">
                                        Pesanan Sedang Dibuat
                                    </div>
                                @elseif($transaksi->status == 'payment')
                                    <div
                                        class="px-3 py-1 my-2 rounded-md text-wrap text-sm font-semibold text-center bg-yellow-100 text-yellow-600">
                                        Pembayaran
                                    </div>
                                @elseif($transaksi->status == 'desain')
                                    <div
                                        class="px-3 py-1 my-2 rounded-md text-wrap text-sm font-semibold text-center bg-blue-100 text-blue-600">
                                        Proses Desain
                                    </div>
                                @elseif($transaksi->status == 'cetak')
                                    <div
                                        class="px-3 py-1 my-2 rounded-md text-wrap text-sm font-semibold text-center bg-purple-100 text-purple-600">
                                        Proses Cetak
                                    </div>
                                @elseif($transaksi->status == 'kirim')
                                    <div
                                        class="px-3 py-1 my-2 rounded-md text-wrap text-sm font-semibold text-center bg-indigo-100 text-indigo-600">
                                        Pesanan Dikirim
                                    </div>
                                @elseif($transaksi->status == 'return')
                                    <div
                                        class="px-3 py-1 my-2 rounded-md text-wrap text-sm font-semibold text-center bg-violet-100 text-violet-600">
                                        Pengajuan Return
                                    </div>
                                @elseif($transaksi->status == 'selesai')
                                    <div
                                        class="px-3 py-1 my-2 rounded-md text-wrap text-sm font-semibold text-center bg-green-100 text-green-600">
                                        Pesanan Selesai
                                    </div>
                                @elseif($transaksi->status == 'gagal')
                                    <div
                                        class="px-3 py-1 my-2 rounded-md text-wrap text-sm font-semibold text-center bg-red-100 text-red-600">
                                        Pesanan Gagal
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if ($transaksi->status != 'make')
                                    @if ($transaksi->transaksi_data->payment_status == 'unpaid')
                                        <div
                                            class="px-3 py-1 my-2 rounded-md text-center text-wrap text-sm font-semibold bg-red-100 text-red-600">
                                            Belum Dibayar
                                        </div>
                                    @elseif ($transaksi->transaksi_data->payment_status == 'pending')
                                        <div
                                            class="px-3 py-1 my-2 rounded-md text-center text-wrap text-sm font-semibold bg-orange-100 text-orange-600">
                                            Menunggu Persetujuan
                                        </div>
                                    @elseif($transaksi->transaksi_data->payment_status == 'approved')
                                        <div
                                            class="px-3 py-1 my-2 rounded-md text-center text-wrap text-sm font-semibold bg-green-100 text-green-600">
                                            Disetujui
                                        </div>
                                    @elseif($transaksi->transaksi_data->payment_status == 'rejected')
                                        <div
                                            class="px-3 py-1 my-2 rounded-md text-center text-wrap text-sm font-semibold bg-red-100 text-red-600">
                                            Ditolak
                                        </div>
                                    @endif
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex flex-wrap gap-3">
                                    @if ($transaksi->status == 'payment' && $transaksi->transaksi_data->payment_status != 'approved')
                                        <a href="{{ route('user.payment.index', $transaksi->transaksi_code) }}"
                                            class="bg-orange-100  px-4 py-2 text-wrap text-center rounded-md">Pembayaran</a>
                                    @endif

                                    @if ($transaksi->tansaktion_type == 'costume')
                                        @if ($transaksi->status == 'make' && $transaksi->costume_transaksi->status == 'approved')
                                            <a href="{{ route('user.checkout.index', $transaksi->transaksi_code) }}"
                                                class="bg-blue-500 text-white px-4 py-2 text-wrap text-center rounded-md">lanjutkan
                                                transaksi</a>
                                        @endif
                                        <a href="{{ route('user.costume.show', $transaksi->id) }}"
                                            class="bg-green-100 text-green-600 px-4 py-2 text-wrap text-center rounded-md">Detail
                                            Costume</a>

                                        @if (!in_array($transaksi->status, ['make', 'payment', 'gagal']))
                                            <a href="{{ route('user.desain.index', $transaksi->transaksi_code) }}"
                                                class="bg-yellow-100 text-yellow-600e px-4 py-2 text-wrap text-center rounded-md">Desain</a>
                                        @endif
                                        @if ($transaksi->status != 'make')
                                            <a href="{{ route('user.transaksi.show', $transaksi->id) }}"
                                                class="bg-blue-500 text-white px-4 py-2 text-wrap text-center rounded-md">Detail</a>
                                        @endif
                                    @else
                                        @if ($transaksi->status == 'make')
                                            <a href="{{ route('user.checkout.index', $transaksi->transaksi_code) }}"
                                                class="bg-blue-500 text-white px-4 py-2 text-wrap text-center rounded-md">lanjutkan
                                                transaksi</a>
                                        @elseif(!in_array($transaksi->status, ['make', 'payment', 'gagal']))
                                            <a href="{{ route('user.desain.index', $transaksi->transaksi_code) }}"
                                                class="bg-yellow-100 text-yellow-600e px-4 py-2 text-wrap text-center rounded-md">Desain</a>
                                        @endif
                                        @if ($transaksi->status != 'make')
                                            <a href="{{ route('user.transaksi.show', $transaksi->id) }}"
                                                class="bg-blue-500 text-white px-4 py-2 text-wrap text-center rounded-md">Detail</a>
                                        @endif
                                    @endif

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="container mx-auto p-4 md:hidden">
            <div class="flex ">
                <div class=" justify-self-start"></div>
                <div class="justify-self-end"></div>
            </div>

            <table id="TransaksiTableMobile" class="min-w-ful  border-collapse overflow-x-scroll rounded-t-lg">
                <thead class="bg-gray-200">
                    <tr class="rounded-t-lg">
                        <th class="text-left rounded-tl-lg">No</th>
                        <th class="py-3 px-4 text-left">Nomor Pesanan</th>
                        <th class="py-3 px-4 text-left rounded-tr-lg"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($transaksis as $transaksi)
                        <tr class="border-t border-gray-300">
                            <td class="text-sm text-gray-500">{{ $loop->iteration }}</td>
                            <td class="px-6 py-6 flex flex-col text-sm text-gray-500">
                                <p>{{ $transaksi->transaksi_code }}</p>
                                @if ($transaksi->status == 'make')
                                    <span
                                        class="px-3 py-1 my-2 rounded-md text-center text-wrap text-sm font-semibold bg-gray-100 text-gray-600">
                                        Pesanan Sedang Dibuat
                                    </span>
                                @elseif($transaksi->status == 'payment')
                                    @if ($transaksi->transaksi_data->payment_status == 'unpaid')
                                        <span
                                            class="px-3 py-1 my-2 rounded-md text-center text-wrap text-sm font-semibold bg-red-100 text-red-600">
                                            Belum Dibayar
                                        </span>
                                    @elseif ($transaksi->transaksi_data->payment_status == 'pending')
                                        <span
                                            class="px-3 py-1 my-2 rounded-md text-center text-wrap text-sm font-semibold bg-orange-100 text-orange-600">
                                            Menunggu Persetujuan
                                        </span>
                                    @elseif($transaksi->transaksi_data->payment_status == 'approved')
                                        <span
                                            class="px-3 py-1 my-2 rounded-md text-center text-wrap text-sm font-semibold bg-green-100 text-green-600">
                                            Disetujui
                                        </span>
                                    @elseif($transaksi->transaksi_data->payment_status == 'rejected')
                                        <span
                                            class="px-3 py-1 my-2 rounded-md text-center text-wrap text-sm font-semibold bg-red-100 text-red-600">
                                            Ditolak
                                        </span>
                                    @endif
                                @elseif($transaksi->status == 'desain')
                                    <span
                                        class="px-3 py-1 my-2 rounded-md text-center text-wrap text-sm font-semibold bg-blue-100 text-blue-600">
                                        Proses Desain
                                    </span>
                                @elseif($transaksi->status == 'cetak')
                                    <span
                                        class="px-3 py-1 my-2 rounded-md text-center text-wrap text-sm font-semibold bg-purple-100 text-purple-600">
                                        Proses Cetak
                                    </span>
                                @elseif($transaksi->status == 'kirim')
                                    <span
                                        class="px-3 py-1 my-2 rounded-md text-center text-wrap text-sm font-semibold bg-indigo-100 text-indigo-600">
                                        Pesanan Dikirim
                                    </span>
                                @elseif($transaksi->status == 'return')
                                    <span
                                        class="px-3 py-1 my-2 rounded-md text-wrap text-center text-sm font-semibold bg-violet-100 text-violet-600">
                                        Pengajuan Return
                                    </span>
                                @elseif($transaksi->status == 'selesai')
                                    <span
                                        class="px-3 py-1 my-2 rounded-md text-center text-wrap text-sm font-semibold bg-green-100 text-green-600">
                                        Pesanan Selesai
                                    </span>
                                @elseif($transaksi->status == 'gagal')
                                    <span
                                        class="px-3 py-1 my-2 rounded-md text-center text-wrap text-sm font-semibold bg-red-100 text-red-600">
                                        Pesanan Gagal
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-6 ">
                                <div class="flex flex-col">

                                    @if ($transaksi->status == 'payment' && $transaksi->transaksi_data->payment_status != 'approved')
                                        <a href="{{ route('user.payment.index', $transaksi->transaksi_code) }}"
                                            class="bg-orange-100  px-4 py-2 text-center text-wrap rounded-md">Pembayaran</a>
                                    @endif
                                    @if ($transaksi->tansaktion_type == 'costume')
                                        @if ($transaksi->status == 'make' && $transaksi->costume_transaksi->status == 'approved')
                                            <a href="{{ route('user.checkout.index', $transaksi->transaksi_code) }}"
                                                class="bg-blue-500 text-white px-4 py-2 text-center text-wrap rounded-md">lanjutkan
                                                transaksi</a>
                                        @endif
                                        <a href="{{ route('user.costume.show', $transaksi->id) }}"
                                            class="bg-green-100 text-green-600 px-4 py-2 text-center text-wrap rounded-md">Detail
                                            Costume</a>
                                    @else
                                        @if ($transaksi->status != 'make')
                                            <a href="{{ route('user.transaksi.show', $transaksi->id) }}"
                                                class="bg-blue-500 text-white px-4 py-2 text-center text-wrap rounded-md">Detail</a>
                                        @endif
                                    @endif
                                    @if ($transaksi->status == 'make' && $transaksi->tansaktion_type != 'costume')
                                        <a href="{{ route('user.checkout.index', $transaksi->transaksi_code) }}"
                                            class="bg-blue-500 text-white px-4 py-2 text-center text-wrap rounded-md">lanjutkan
                                            transaksi</a>
                                    @elseif(!in_array($transaksi->status, ['make', 'payment', 'gagal']))
                                        <a href="{{ route('user.desain.index', $transaksi->transaksi_code) }}"
                                            class="bg-yellow-100 text-yellow-600e px-4 py-2 text-center text-wrap rounded-md">Desain</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
        <script src="{{ asset('assets/js/datatable.tailwind.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#TransaksiTable').DataTable({
                    responsive: true,
                    paging: true,
                    lengthChange: false, // Menyembunyikan "entries per page" control
                    columnDefs: [{
                        orderable: false,
                        searching: false,
                        targets: 5
                    }]
                });
            });
            if (!$.fn.DataTable.isDataTable('#TransaksiTableMobile')) {
                this.dataTableInstance = new DataTable('#TransaksiTableMobile', {
                    paging: false,
                    lengthChange: false, // Menyembunyikan "entries per page" control
                    info: false,
                    columnDefs: [{
                            orderable: false,
                            searching: false,
                            targets: 2
                        } // Kolom ke-6 (Aksi) tidak bisa diurutkan
                    ]
                });
            }
        </script>
    </x-slot>
</x-guest-layout>
