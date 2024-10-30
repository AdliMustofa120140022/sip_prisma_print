<button type="button" class="text-secondary font-weight-bold text-decoration-underline pe-3 bg-transparent border-0"
    data-bs-toggle="modal" data-bs-target="#modelEdit{{ $transaksi->id }}">
    Update
</button>


<div class="modal fade" id="modelEdit{{ $transaksi->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalEditLabel{{ $transaksi->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel{{ $transaksi->id }}">
                    Update Status Pesanan</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container row gap-4">
                    <!-- Informasi Transaksi -->
                    <div class="col-md-5">
                        <div class="row">
                            <div class="card p-3">
                                <h6 class="border-bottom pb-2 mb-3">Informasi Transaksi</h6>
                                <div class="mb-2">
                                    <strong>ID Transaksi:</strong> {{ $transaksi->transaksi_code }}
                                </div>
                                <div class="mb-2">
                                    <strong>Tanggal Transaksi:</strong>
                                    {{ $transaksi->created_at->format('d M Y, H:i') }}
                                </div>

                            </div>
                        </div>
                        <div class="row mt-4 ">
                            <div class="card p-3">
                                <h6 class="border-bottom pb-2 mb-3">Detail Produk</h6>

                                <div class="mb-2">
                                    <strong>Nama Produk :</strong> {{ $transaksi->costume_transaksi->product_name }}
                                </div>
                                <div class="mb-2">
                                    <strong>Katagori :</strong> {{ $transaksi->costume_transaksi->katagori->nama }}
                                </div>
                                <div class="mb-2">
                                    <strong>Sub Katagori :</strong>
                                    {{ $transaksi->costume_transaksi->sub_katagori->name }}
                                </div>
                                <div class="mb-2">
                                    <strong>Tema :</strong> {{ $transaksi->costume_transaksi->theme }}
                                </div>
                                <div class="mb-2">
                                    <strong>Ukuran Panjang :</strong> {{ $transaksi->costume_transaksi->length_cm }} mm
                                </div>
                                <div class="mb-2">
                                    <strong>Ukuran Lebar :</strong> {{ $transaksi->costume_transaksi->width_cm }} mm
                                </div>
                                <div class="mb-2">
                                    <strong>Ukuran Tinggi :</strong> {{ $transaksi->costume_transaksi->height_gram }}
                                    mm
                                </div>
                                <div class="mb-2">
                                    <strong>Ketebalan :</strong> {{ $transaksi->costume_transaksi->thickness_cm }} gsm
                                </div>
                                <div class="mb-2">
                                    <strong>Jumlah Lembar :</strong> {{ $transaksi->costume_transaksi->sheet_count }}
                                    lembar
                                </div>
                                <div class="mb-2">
                                    <strong>Bahan :</strong> {{ $transaksi->costume_transaksi->material }}
                                </div>
                                <div class="mb-2">
                                    <strong>Warna :</strong> {{ $transaksi->costume_transaksi->color }}
                                </div>
                                <div class="mb-2">
                                    <strong>Jenis Print :</strong> {{ $transaksi->costume_transaksi->print_type }}
                                </div>
                                <div class="mb-2">
                                    <strong>Resolusi Print :</strong>
                                    {{ $transaksi->costume_transaksi->print_resolution }}
                                </div>
                                <div class="mb-2">
                                    <strong>Finishing :</strong> {{ $transaksi->costume_transaksi->finishing }}
                                </div>
                                <div class="mb-2">
                                    <strong>Jenis Tinta :</strong> {{ $transaksi->costume_transaksi->ink_type }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="row mt-sm-4 mt-md-0">
                            <div class="card p-3">
                                <h6 class="border-bottom pb-2 mb-3">Detail Pesanan</h6>

                                <div class="mb-2">
                                    <strong>Jumlah Pesanan :</strong>
                                    {{ $transaksi->costume_transaksi->order_quantity }}
                                </div>
                                <div class="mb-2">
                                    <strong>Satuan Pesanan :</strong> {{ $transaksi->costume_transaksi->unit }}
                                </div>
                                <div class="mb-2">
                                    <strong>Tanggal Penggunaan :</strong>
                                    {{ $transaksi->costume_transaksi->usage_deadline }}
                                </div>

                            </div>
                        </div>


                        <div class="row mt-sm-4 mt-4">
                            <div class="card p-3">
                                <h6 class="border-bottom pb-2 mb-3">Konfirmasi Pesanan Kustom</h6>
                                <form action="{{ route('admin.costume.update', $transaksi->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Konfirmasi Pesanan</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="approved">Disetujui</option>
                                            <option value="rejected">Ditolak</option>
                                        </select>
                                    </div>

                                    @error('status')
                                        <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                                    @enderror

                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Harga</label>
                                        <input type="number" name="harga" id="harga" class="form-control"
                                            placeholder="Harga"></input>
                                    </div>
                                    @error('harga')
                                        <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                                    @enderror
                                    <div class="mb-3">
                                        <label for="Catatan" class="form-label">Catatan</label>
                                        <textarea name="Catatan" id="Catatan" class="form-control" placeholder="Catatan" rows="3"></textarea>
                                    </div>
                                    @error('Catatan')
                                        <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                                    @enderror
                                    <button type="submit" class="btn btn-dark text-white">Konfirmasi</button>

                                </form>
                            </div>
                        </div>

                    </div>


                </div>

            </div>

        </div>
    </div>
</div>
