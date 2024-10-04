<button type="button" class="text-secondary font-weight-bold text-decoration-underline pe-3 bg-transparent border-0"
    data-bs-toggle="modal" data-bs-target="#modalEdit{{ $transaksi->id }}">
    update
</button>


<div class="modal fade" id="modalEdit{{ $transaksi->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalEditLabel{{ $transaksi->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel{{ $transaksi->id }}">
                    Ubah Sub Katagori {{ $transaksi->name }}</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.pesanan.update', $transaksi->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                    </h6>

                    <div class="row mb-5">
                        <h6 class="ps-4 mt-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                            Data Transaksi</h6>
                        <div class="col-md-6 mb-3">
                            <label for="kd">kode Transaksi</label>
                            <input name="kd" id="kd" type="text" class="form-control" disabled
                                value="{{ $transaksi->transaksi_code }}">

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kd">waktu transaksi</label>
                            <input name="kd" id="kd" type="text" class="form-control" disabled
                                value="{{ $transaksi->created_at }}">

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kd">Nama Pemesan</label>
                            <input name="kd" id="kd" type="text" class="form-control" disabled
                                value="{{ $transaksi->user->name }}">

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="description">Produk</label>
                            <textarea name="description" id="description" type="text" class="form-control" placeholder="Deskripsi"
                                aria-label="description" disabled>
@foreach ($transaksi->produk_transaksi as $produk_transaksi)
{{ $produk_transaksi->produck->name }} - {{ $produk_transaksi->jumlah }}
@endforeach
</textarea>
                        </div>

                        <h6 class="ps-4 mt-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                            Data pembayaran</h6>
                        <div class="col-md-6 mb-3">
                            <label for="total_harga">Total Targa</label>
                            <input name="total_harga" id="total_harga" type="text" class="form-control" disabled
                                value="{{ $transaksi->total_harga }}">

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="total_harga">Metode Pembayaran</label>
                            <input name="total_harga" id="total_harga" type="text" class="form-control" disabled
                                value="{{ $transaksi->transaksi_data->payment_metode->name }}">

                        </div>
                        <h6 class="ps-4 mt-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                            Data Pengiriman</h6>
                        <div class="col-md-6 mb-3">
                            <label for="total_harga">Metode Pengiriman</label>
                            <input name="total_harga" id="total_harga" type="text" class="form-control" disabled
                                value="{{ $transaksi->transaksi_data->metode_pengiriman }}">

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="total_harga">Nomro Resi</label>
                            <input name="total_harga" id="total_harga" type="text" class="form-control" disabled
                                value="{{ $transaksi->transaksi_data->resi }}">

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="update_status">Update Statut</label>
                            <select name="update_status" id="update_status" class="form-control">
                                <option value="payment" {{ $transaksi->status == 'payment' ? 'selected' : '' }}>
                                    Menunggu Pembayaran
                                </option>
                                <option value="payment_konfirm"
                                    {{ $transaksi->status == 'payment_konfirm' ? 'selected' : '' }}>
                                    Menunggu Konfirmasi Pembayaran
                                </option>
                                <option value="payment_done"
                                    {{ $transaksi->status == 'payment_done' ? 'selected' : '' }}>
                                    Pembayaran Selesai
                                </option>
                                <option value="desain" {{ $transaksi->status == 'desain' ? 'selected' : '' }}>
                                    Desain
                                </option>
                                <option value="cetak" {{ $transaksi->status == 'cetak' ? 'selected' : '' }}>
                                    Cetak
                                </option>
                                <option value="kirim" {{ $transaksi->status == 'kirim' ? 'selected' : '' }}>
                                    Kirim
                                </option>
                                <option value="selesai" {{ $transaksi->status == 'selesai' ? 'selected' : '' }}>
                                    Selesai
                                </option>
                                <option value="gagal" {{ $transaksi->status == 'gagal' ? 'selected' : '' }}>
                                    Gagal
                                </option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save
                            changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
