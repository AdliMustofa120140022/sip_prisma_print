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


            <table id="TransaksiTable" class="min-w-full bg-white border border-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">No</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nomor Pesanan</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Tanggal Pemesanan</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Pesanan</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $transaksi)
                        <tr class="border-t border-gray-300">
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $transaksi->transaksi_code }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $transaksi->created_at }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                @foreach ($transaksi->produk_transaksi as $produk_transaksi)
                                    {{ $produk_transaksi->produck->name }} ({{ $produk_transaksi->jumlah }}),
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                @if ($transaksi->status == 'make')
                                    <span
                                        class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-600">
                                        {{ $transaksi->status }}
                                    </span>
                                    {{-- <span class="px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-600">
                                {{ $transaksi->status }}
                            </span> --}}
                                @else
                                @endif
                                <span class="px-3 py-1 rounded-full text-sm font-semibold "
                                    :class="{
                                        'bg-blue-100 text-blue-600': order.status === 'Dalam Proses',
                                        'bg-green-100 text-green-600': order.status === 'Selesai',
                                        'bg-red-100 text-red-600': order.status === 'Gagal'
                                    }">
                                    {{ $transaksi->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Detail</button>
                                <a href="{{ route('user.checkout.index', $transaksi->transaksi_code) }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md">lanjutkan transaksi</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
        <script>
            if (!$.fn.DataTable.isDataTable('#TransaksiTable')) {
                this.dataTableInstance = new DataTable('#TransaksiTable', {
                    responsive: true,
                    paging: true,
                    lengthChange: false, // Menyembunyikan "entries per page" control
                    columnDefs: [{
                            orderable: false,
                            searching: false,
                            targets: 5
                        } // Kolom ke-6 (Aksi) tidak bisa diurutkan
                    ]
                });
            }
        </script>
    </x-slot>
</x-guest-layout>
