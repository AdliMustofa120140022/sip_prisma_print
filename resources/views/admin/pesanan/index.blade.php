<x-app-layout>
    <x-slot name="title">Pesanan</x-slot>
    <x-slot name="metas">

        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
        {{-- <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script> --}}
    </x-slot>

    <section class="m-3">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="d-flex justify-content-between items-center">
                        <div class="card-header pb-0">
                            <h6>Pesanan</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="dataTabel" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-info  font-weight-bolder opacity-7">NO</th>
                                        <th class="text-uppercase text-info   font-weight-bolder opacity-7 ps-2">Kode
                                            Transaksi</th>
                                        <th
                                            class="text-center text-uppercase text-info   font-weight-bolder opacity-7 ps-2">
                                            Tanggal Transaksi
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-info   font-weight-bolder opacity-7 ps-2">
                                            Nama Pelanggan
                                        </th>
                                        <th class="text-center text-uppercase text-info  font-weight-bolder opacity-7">
                                            Metode Pengiriman
                                        </th>
                                        <th class="text-center text-uppercase text-info  font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                        <th class="text-center text-uppercase text-info  font-weight-bolder opacity-7">
                                            Status Pembayaran
                                        </th>
                                        <th class="text-info opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($transaksis as $transaksi)
                                        <tr>
                                            <td>
                                                <p class=" ps-3 text-secondary  font-weight-bold">
                                                    {{ $loop->iteration }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class=" text-secondary  font-weight-bold">
                                                    {{ $transaksi->transaksi_code ?? '-' }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class=" text-secondary text-center font-weight-bold">
                                                    {{ $transaksi->created_at ?? '-' }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class=" text-secondary text-center font-weight-bold">
                                                    {{ $transaksi->user->name ?? '-' }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class=" text-secondary text-center font-weight-bold">
                                                    {{ $transaksi->transaksi_data->metode_pengiriman ?? '-' }}
                                                </p>
                                            </td>
                                            <td>
                                                @if ($transaksi->status == 'payment')
                                                    <p class=" text-warning text-center font-weight-bold">
                                                        Proses Pembayaran
                                                    </p>
                                                @elseif($transaksi->status == 'desain')
                                                    <p class=" text-primary text-center font-weight-bold">
                                                        Desain
                                                    </p>
                                                @elseif($transaksi->status == 'cetak')
                                                    <p class=" text-primary text-center font-weight-bold">
                                                        cetak
                                                    </p>
                                                @elseif($transaksi->status == 'kirim')
                                                    <p class=" text-primary text-center font-weight-bold">
                                                        kirim
                                                    </p>
                                                @elseif($transaksi->status == 'return')
                                                    <p class=" text-primary text-center font-weight-bold">
                                                        return
                                                    </p>
                                                @elseif($transaksi->status == 'selesai')
                                                    <p class=" text-succes text-center font-weight-bold">
                                                        selesai
                                                    </p>
                                                @elseif($transaksi->status == 'gagal')
                                                    <p class=" text-danger text-center font-weight-bold">
                                                        gagal
                                                    </p>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($transaksi->transaksi_data->payment_status == 'unpaid')
                                                    <span class="text-center font-weight-bold badge bg-danger">
                                                        Belum Dibayar
                                                    </span>
                                                @elseif ($transaksi->transaksi_data->payment_status == 'pending')
                                                    <span
                                                        class="text-center font-weight-bold badge bg-warning text-dark">
                                                        Menunggu Persetujuan
                                                    </span>
                                                @elseif ($transaksi->transaksi_data->payment_status == 'approved')
                                                    <span class="text-center font-weight-bold badge bg-success">
                                                        Disetujui
                                                    </span>
                                                @elseif ($transaksi->transaksi_data->payment_status == 'rejected')
                                                    <span class="text-center font-weight-bold badge bg-danger">
                                                        Ditolak
                                                    </span>
                                                @endif
                                            </td>

                                            <td class="align-middle">
                                                <div class="d-flex ">
                                                    @include('admin.pesanan.detail')

                                                    @if ($transaksi->status == 'payment' || $transaksi->status == 'desain' || $transaksi->status == 'cetak')
                                                        @include('admin.pesanan.edit')
                                                    @endif

                                                    @if ($transaksi->status == 'return' || $transaksi->return_transaksi != null)
                                                        @include('admin.pesanan.return')
                                                    @endif
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="scripts">
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTabel').DataTable();
            });
        </script>
    </x-slot>


</x-app-layout>
