<x-app-layout>
    <x-slot name="title">Produk</x-slot>
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
                            <h6>Produk</h6>
                        </div>
                        <div class="d-flex gap-2">

                            <a href="{{ route('admin.product.create') }}"
                                class="btn bg-gradient-primary mt-4 mb-0 px-5 text-white me-3">Tambah
                                Produk</a>
                            <button class="btn bg-gradient-info mt-4 mb-0 px-5 text-white me-3">Import
                                Produk</button>
                            <a href="#" class="btn bg-gradient-success mt-4 mb-0 px-5 text-white me-3">export
                                Produk</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="dataTabel" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-info  font-weight-bolder opacity-7">NO</th>
                                        <th class="text-uppercase text-info   font-weight-bolder opacity-7 ps-2">Kode
                                            Produk</th>
                                        <th
                                            class="text-center text-uppercase text-info   font-weight-bolder opacity-7 ps-2">
                                            Katagori Produk
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-info   font-weight-bolder opacity-7 ps-2">
                                            Sub Katagori Produk
                                        </th>
                                        <th class="text-center text-uppercase text-info  font-weight-bolder opacity-7">
                                            Nama Produk
                                        </th>
                                        <th class="text-center text-uppercase text-info  font-weight-bolder opacity-7">
                                            Stock
                                        </th>
                                        <th class="text-info opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($producks as $produck)
                                        <tr>
                                            <td>
                                                <p class=" ps-3 text-secondary  font-weight-bold">
                                                    {{ $loop->iteration }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class=" text-secondary  font-weight-bold">
                                                    {{ $produck->prduck_code ?? '-' }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class=" text-secondary text-center font-weight-bold">
                                                    {{ $produck->sub_katagori->katagori->nama ?? '-' }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class=" text-secondary text-center font-weight-bold">
                                                    {{ $produck->sub_katagori->name ?? '-' }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class=" text-secondary text-center font-weight-bold">
                                                    {{ $produck->name ?? '-' }}
                                                </p>
                                            </td>
                                            <td>
                                                <p
                                                    class=" {{ $produck->data_produck->stok < 60 ? 'text-danger' : 'text-secondary' }} text-center font-weight-bold">
                                                    {{ $produck->data_produck->stok ?? '-' }}
                                                </p>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.product.edit', $produck->id) }}"
                                                        class="text-secondary font-weight-bold text-decoration-underline pe-3"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        Edit
                                                    </a>
                                                    <a href="{{ route('admin.product.show', $produck->id) }}"
                                                        class="text-secondary font-weight-bold text-decoration-underline  pe-3"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        detail
                                                    </a>

                                                    <form action="#" method="POST" class="p-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="border-0 bg-transparent text-secondary font-weight-bold text-decoration-underline"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Hapus
                                                        </button>
                                                    </form>

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
