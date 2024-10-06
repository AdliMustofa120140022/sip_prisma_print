<x-app-layout>
    <x-slot name="title">Desain</x-slot>
    <x-slot name="metas">

        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    </x-slot>

    <section class="m-3">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="d-flex justify-content-between items-center">
                        <div class="card-header pb-0">
                            <h6>Desain</h6>
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


                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.desain.show', $transaksi->id) }}"
                                                        class="text-secondary font-weight-bold text-decoration-underline  pe-3"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        Desain
                                                    </a>
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
