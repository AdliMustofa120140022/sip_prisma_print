<x-app-layout>
    <x-slot name="title">Pesanana</x-slot>
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


                    </div>
                    <div class="card-body ">
                        <form action={{ route('admin.export.export') }} method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="start_date">Dari Tanggal</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date">
                                    @error('start_date')
                                        <p class="text-danger p-0 m-0">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="end_date">Sampai Tanggal</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date">
                                    @error('end_date')
                                        <p class="text-danger p-0 m-0">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">

                                <button type="submit" class="btn bg-gradient-primary">Export</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="scripts">

    </x-slot>


</x-app-layout>
