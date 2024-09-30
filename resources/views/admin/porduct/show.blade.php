<x-app-layout>
    <x-slot name="title">Show Produk</x-slot>

    <section class="m-3">
        <div class=" bg-white shadow border-radius-lg p-4">
            <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">Permohonan Bantuan Sosial</h3>
                <p class="mb-0">silahkan isi semua dokumen yang diperlukan</p>
            </div>
            <form action="">
                <div class="row align-items-center">
                    <h6 class="ps-4 mt-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Data Produk</h6>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Nama Produk
                                <input name="name" id="name" type="text" class="form-control"
                                    placeholder="Nama Produk" aria-label="name" value="{{ $produck->name }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="description">Deskirpsi
                                <textarea name="description" id="description" type="text" class="form-control" placeholder="Deskripsi"
                                    aria-label="description" disabled>{{ $produck->description }}</textarea>

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sub_kategori_id">Katagori
                                <select name="sub_kategori_id" id="sub_kategori_id" class="form-control"
                                    aria-label="sub_kategori_id" disabled>
                                    <option value="">Pilih Katagori</option>
                                    @foreach ($sub_katagoris as $sub_katagori)
                                        <option value="{{ $sub_katagori->id }}"
                                            {{ $produck->sub_katagori->id == $sub_katagori->id ? 'selected' : '' }}>
                                            {{ $sub_katagori->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <h6 class="ps-4 mt-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Data Stok Dan Dimensi</h6>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="stok">Jumlah Stok
                                <input name="stok" id="stok" type="number" class="form-control"
                                    placeholder="Jumlah Stok" aria-label="stok"
                                    value="{{ $produck->data_produck->stok }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lebar">Ukuran lebar (mm)
                                <input name="lebar" id="lebar" type="number" class="form-control"
                                    placeholder="Ukuran lebar (mm)" aria-label="lebar"
                                    value="{{ $produck->data_produck->lebar }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="panjang">Ukuran Panjang (mm)
                                <input name="panjang" id="panjang" type="number" class="form-control"
                                    placeholder="Ukuran Panjang (mm)" aria-label="panjang"
                                    value="{{ $produck->data_produck->panjang }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tinggi">Ukuran Tinggi (mm)
                                <input name="tinggi" id="tinggi" type="number" class="form-control"
                                    placeholder="Ukuran Tinggi (mm)" aria-label="tinggi"
                                    value="{{ $produck->data_produck->tinggi }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="berat">Berat per Satuan
                                <input name="berat" id="berat" type="number" class="form-control"
                                    placeholder="Berat per Satuan " aria-label="berat"
                                    value="{{ $produck->data_produck->berat }}" disabled>
                        </div>


                    </div>
                </div>
                <div class="row align-items-center">
                    <h6 class="ps-4 mt-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Data Sepesifikasi Teknis</h6>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="bahan">Bahan
                                <input name="bahan" id="bahan" type="text" class="form-control"
                                    placeholder="Bahan" aria-label="bahan" value="{{ $produck->data_produck->bahan }}"
                                    disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="warna">warna
                                <input name="warna" id="warna" type="text" class="form-control"
                                    placeholder="warna" aria-label="warna"
                                    value="{{ $produck->data_produck->warna }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jenis_cetak">Jenis Cetakan
                                <input name="jenis_cetak" id="jenis_cetak" type="text" class="form-control"
                                    placeholder="Jenis Cetakan" aria-label="jenis_cetak"
                                    value="{{ $produck->data_produck->jenis_cetak }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="resolusi">Resolusi Cetakan
                                <input name="resolusi" id="resolusi" type="text" class="form-control"
                                    placeholder="Resolusi Cetakan" aria-label="resolusi"
                                    value="{{ $produck->data_produck->resolusi }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="finishing">Finishing
                                <input name="finishing" id="finishing" type="text" class="form-control"
                                    placeholder="Finishing" aria-label="finishing"
                                    value="{{ $produck->data_produck->finishing }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kertas">Jenis Kertas
                                <input name="kertas" id="kertas" type="text" class="form-control"
                                    placeholder="Jenis kertas" aria-label="kertas"
                                    value="{{ $produck->data_produck->kertas }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ketebalan_kertas">Ketebalan Kertas
                                <input name="ketebalan_kertas" id="ketebalan_kertas" type="number"
                                    class="form-control" placeholder="Ketebalan Kertas" aria-label="ketebalan_kertas"
                                    value="{{ $produck->data_produck->ketebalan_kertas }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tinta">Tinta yang Digunakan
                                <input name="tinta" id="tinta" type="text" class="form-control"
                                    placeholder="Tinta yang Digunakan" aria-label="tinta"
                                    value="{{ $produck->data_produck->tinta }}" disabled>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <h6 class="ps-4 mt-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Informasi harga</h6>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="harga_satuan">Harga Satuan
                                <input name="harga_satuan" id="harga_satuan" type="number" class="form-control"
                                    placeholder="Harga Satuan" aria-label="harga_satuan"
                                    value="{{ $produck->data_produck->harga_satuan }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="harga_grosir">Harga Grosir</label>
                            <input name="harga_grosir" id="harga_grosir" type="number" class="form-control"
                                placeholder="Harga Grosir" aria-label="harga_grosir"
                                value="{{ $produck->data_produck->harga_grosir }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="minimal_grosir">Minimal cetakan (untuk harga grosir)</label>
                            <input name="minimal_grosir" id="minimal_grosir" type="number" class="form-control"
                                placeholder="Minimal cetakan (untuk harga grosir)" aria-label="minimal_grosir"
                                value="{{ $produck->data_produck->minimal_grosir }}" disabled>
                        </div>

                    </div>
                </div>

                <div class="row align-items-center">
                    <h6 class="ps-4 mt-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Data Lainya</h6>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_masuk">Tanggal Masuk
                                <input name="tanggal_masuk" id="tanggal_masuk" type="date" class="form-control"
                                    placeholder="Tanggal Masuk" aria-label="tanggal_masuk"
                                    value="{{ $produck->data_produck->tanggal_masuk }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
                            <input name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" type="date"
                                class="form-control" placeholder="Tanggal Kadaluarsa" aria-label="tanggal_kadaluarsa"
                                value="{{ $produck->data_produck->tanggal_kadaluarsa }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lokasi">Lokasi Penyimpanan
                                <input name="lokasi" id="lokasi" type="text" class="form-control"
                                    placeholder="Lokasi Penyimpanan" aria-label="lokasi"
                                    value="{{ $produck->data_produck->lokasi }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="supplier">Supplier
                                <input name="supplier" id="supplier" type="text" class="form-control"
                                    placeholder="Supplier" aria-label="supplier"
                                    value="{{ $produck->data_produck->supplier }}" disabled>
                        </div>

                    </div>
                </div>
                <div class="row align-items-center">
                    <h6 class="ps-4 mt-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        GamBar Produk</h6>
                    <div class="d-flex gap-3 justify-content-center align-items-center">
                        @foreach ($produck->img_produck as $img_produck)
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('storage/img/produck/' . $img_produck->img) }}"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title
                                    text-center">
                                        {{ $produck->name }} - {{ $loop->iteration }}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="row">
                        <div id="image-preview-container"
                            class="img-preview-container d-flex flex-wrap align-items-center gap-3 justify-content-center py-5 ">
                        </div>
                        <div class="drop-zone w-full d-flex justify-content-center align-items-center  rounded-2xl border-dashed border-black "
                            id="drop-zone" style="height: 200px">
                            <span>Drag & Drop hire or click hire to select</span>
                            <input type="file" id="image" name="image[]" accept="image/*" class="d-none"
                                multiple onchange="previewImages(event)">
                        </div>
                    </div> --}}
                </div>

                <div class="col-md-11 ">
                    <div class="d-flex justify-content-end gap-3">
                        <button type="button"
                            class="btn bg-gradient-faded-success mt-4 mb-0 px-5 text-white">Edit</button>
                        <button type="button"
                            class="btn bg-gradient-faded-danger mt-4 mb-0 px-5 text-white">kembali</button>
                    </div>
                </div>
            </form>

        </div>

    </section>
</x-app-layout>
