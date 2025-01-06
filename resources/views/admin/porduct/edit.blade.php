<x-app-layout>
    <x-slot name="title">Add Produk</x-slot>

    <section class="m-3">
        <div class=" bg-white shadow border-radius-lg p-4">
            <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">
                    Edit Produk
                </h3>
                <p class="mb-0">
                    Silahkan isi form di bawah ini dengan data yang benar
                </p>
            </div>
            <form action="{{ route('admin.product.update', $produck->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row align-items-center">
                    <h6 class="ps-4 mt-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Data Produk</h6>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Nama Produk<span class="text-danger">*</span></label>
                            <input name="name" id="name" type="text" class="form-control"
                                placeholder="Nama Produk" aria-label="name" value="{{ $produck->name, old('name') }}">
                            @error('name')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="description">Deskirpsi<span class="text-danger">*</span></label>
                            <textarea name="description" id="description" type="text" class="form-control" placeholder="Deskripsi"
                                aria-label="description">{{ $produck->description, old('description') }}</textarea>
                            @error('description')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sub_kategori_id">Katagori<span class="text-danger">*</span></label>
                            <select name="sub_kategori_id" id="sub_kategori_id" class="form-control"
                                aria-label="sub_kategori_id">
                                <option value="">Pilih Katagori</option>
                                @foreach ($sub_katagoris as $sub_katagori)
                                    <option value="{{ $sub_katagori->id }}"
                                        {{ $produck->sub_katagori->id == $sub_katagori->id ? 'selected' : '' }}>
                                        {{ $sub_katagori->name }}</option>
                                @endforeach
                            </select>
                            @error('sub_kategori_id')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <h6 class="ps-4 mt-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Data Stok Dan Dimensi</h6>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="stok">Jumlah Stok<span class="text-danger">*</span></label>
                            <input name="stok" id="stok" type="number" step="0.01" class="form-control"
                                placeholder="Jumlah Stok" aria-label="stok"
                                value="{{ $produck->data_produck->stok, old('stok') }}">
                            @error('stok')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lebar">Ukuran lebar (mm)<span class="text-danger">*</span></label>
                            <input name="lebar" id="lebar" type="number" step="0.01" class="form-control"
                                placeholder="Ukuran lebar (mm)" aria-label="lebar"
                                value="{{ $produck->data_produck->lebar, old('lebar') }}">
                            @error('lebar')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="panjang">Ukuran Panjang (mm)<span class="text-danger">*</span></label>
                            <input name="panjang" id="panjang" type="number" step="0.01" class="form-control"
                                placeholder="Ukuran Panjang (mm)" aria-label="panjang"
                                value="{{ $produck->data_produck->panjang, old('panjang') }}">
                            @error('panjang')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tinggi">Ukuran Tinggi (mm)<span class="text-danger">*</span></label>
                            <input name="tinggi" id="tinggi" type="number" step="0.01" class="form-control"
                                placeholder="Ukuran Tinggi (mm)" aria-label="tinggi"
                                value="{{ $produck->data_produck->tinggi, old('tinggi') }}">
                            @error('tinggi')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="berat">Berat per Satuan (gram) <span class="text-danger">*</span></label>
                            <input name="berat" id="berat" type="number" step="0.01" class="form-control"
                                placeholder="Berat per Satuan " aria-label="berat"
                                value="{{ $produck->data_produck->berat, old('berat') }}">
                            @error('berat')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>


                    </div>
                </div>
                <div class="row align-items-center">
                    <h6 class="ps-4 mt-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Data Sepesifikasi Teknis</h6>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="bahan">Bahan<span class="text-danger">*</span></label>
                            <input name="bahan" id="bahan" type="text" class="form-control"
                                placeholder="Bahan" aria-label="bahan"
                                value="{{ $produck->data_produck->bahan, old('bahan') }}">
                            @error('bahan')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="warna">warna<span class="text-danger">*</span></label>
                            <input name="warna" id="warna" type="text" class="form-control"
                                placeholder="warna" aria-label="warna"
                                value="{{ $produck->data_produck->warna, old('warna') }}">
                            @error('warna')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jenis_cetak">Jenis Cetakan<span class="text-danger">*</span></label>
                            <input name="jenis_cetak" id="jenis_cetak" type="text" class="form-control"
                                placeholder="Jenis Cetakan" aria-label="jenis_cetak"
                                value="{{ $produck->data_produck->jenis_cetak, old('jenis_cetak') }}">
                            @error('jenis_cetak')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="resolusi">Resolusi Cetakan<span class="text-danger">*</span></label>
                            <input name="resolusi" id="resolusi" type="text" class="form-control"
                                placeholder="Resolusi Cetakan" aria-label="resolusi"
                                value="{{ $produck->data_produck->resolusi, old('resolusi') }}">
                            @error('resolusi')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="finishing">Finishing<span class="text-danger">*</span></label>
                            <input name="finishing" id="finishing" type="text" class="form-control"
                                placeholder="Finishing" aria-label="finishing"
                                value="{{ $produck->data_produck->finishing, old('finishing') }}">
                            @error('finishing')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kertas">Jenis Kertas<span class="text-danger">*</span></label>
                            <input name="kertas" id="kertas" type="text" class="form-control"
                                placeholder="Jenis kertas" aria-label="kertas"
                                value="{{ $produck->data_produck->kertas, old('kertas') }}">
                            @error('kertas')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ketebalan_kertas">Ketebalan Kertas<span class="text-danger">*</span></label>
                            <input name="ketebalan_kertas" id="ketebalan_kertas" type="number" step="0.01"
                                class="form-control" placeholder="Ketebalan Kertas" aria-label="ketebalan_kertas"
                                value="{{ $produck->data_produck->ketebalan_kertas, old('ketebalan_kertas') }}">
                            @error('ketebalan_kertas')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tinta">Tinta yang Digunakan<span class="text-danger">*</span></label>
                            <input name="tinta" id="tinta" type="text" class="form-control"
                                placeholder="Tinta yang Digunakan" aria-label="tinta"
                                value="{{ $produck->data_produck->tinta, old('tinta') }}">
                            @error('tinta')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <h6 class="ps-4 mt-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Informasi harga</h6>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="harga_satuan">Harga Satuan<span class="text-danger">*</span></label>
                            <input name="harga_satuan" id="harga_satuan" type="number" class="form-control"
                                placeholder="Harga Satuan" aria-label="harga_satuan"
                                value="{{ $produck->data_produck->harga_satuan, old('harga_satuan') }}">
                            @error('harga_satuan')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="satuan">Satuan</label>
                            <input name="satuan" id="satuan" type="text" class="form-control"
                                placeholder="Satuan" aria-label="satuan"
                                value="{{ $produck->data_produck->satuan, old('satuan') }}">
                            @error('satuan')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="minimal_grosir">Minimal Pemesanan</label>
                            <input name="minimal_grosir" id="minimal_grosir" type="number" class="form-control"
                                placeholder="Minimal Pemesanan" aria-label="minimal_grosir"
                                value="{{ $produck->data_produck->minimal_grosir, old('minimal_grosir') }}">
                            @error('minimal_grosir')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="row align-items-center">
                    <h6 class="ps-4 mt-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        Data Lainya</h6>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_masuk">Tanggal Masuk<span class="text-danger">*</span></label>
                            <input name="tanggal_masuk" id="tanggal_masuk" type="date" class="form-control"
                                placeholder="Tanggal Masuk" aria-label="tanggal_masuk"
                                value="{{ $produck->data_produck->tanggal_masuk, old('tanggal_masuk') }}">
                            @error('tanggal_masuk')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
                            <input name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" type="date"
                                class="form-control" placeholder="Tanggal Kadaluarsa" aria-label="tanggal_kadaluarsa"
                                value="{{ $produck->data_produck->tanggal_kadaluarsa, old('tanggal_kadaluarsa') }}">
                            @error('tanggal_kadaluarsa')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lokasi">Lokasi Penyimpanan<span class="text-danger">*</span></label>
                            <input name="lokasi" id="lokasi" type="text" class="form-control"
                                placeholder="Lokasi Penyimpanan" aria-label="lokasi"
                                value="{{ $produck->data_produck->lokasi, old('lokasi') }}">
                            @error('lokasi')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="supplier">Supplier<span class="text-danger">*</span></label>
                            <input name="supplier" id="supplier" type="text" class="form-control"
                                placeholder="Supplier" aria-label="supplier"
                                value="{{ $produck->data_produck->supplier, old('supplier') }}">
                            @error('supplier')
                                <p class="text-danger p-0 m-0">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="row align-items-center" id="gambarProduk">
                    <h6 class="ps-4 mt-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        GamBar produk</h6>
                    <div
                        class="img-preview-container d-flex flex-wrap align-items-center gap-3 justify-content-center py-5 ">
                        @foreach ($produck->img_produck as $img_produck)
                            <div class="position-relative ratio ratio-1x1 w-20 border rounded rounded-2xl">
                                <img src="{{ asset('storage/img_produck/' . $img_produck->img) }}" alt=""
                                    class="rounded-2xl img-fluid" style="object-fit: cover;">
                                <a href="{{ route('admin.product.delete-image', $img_produck->id) }}"
                                    class="btn btn-danger position-absolute top-0 end-0 m-1 rounded-circle"
                                    style="padding: 0.2rem; font-size: 0.8rem; width: 1.5rem; height: 1.5rem; line-height: 1rem; z-index: 1;">×</a>
                            </div>
                        @endforeach
                    </div>

                    <h6 class="ps-4 mt-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                        GamBar baru</h6>

                    <div class="row">
                        <div id="image-preview-container"
                            class="img-preview-container d-flex flex-wrap align-items-center gap-3 justify-content-center py-5 ">
                        </div>
                        <div class="drop-zone w-full d-flex justify-content-center align-items-center  rounded-2xl border-dashed border-black "
                            id="drop-zone" style="height: 200px">
                            <span>Drag & Drop hire or click hire to select</span>
                            <input type="file" id="image" name="image[]" accept="image/*" class="d-none"
                                multiple>
                        </div>

                    </div>
                </div>

                <div class="col-md-11 ">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.product.index') }}"
                            class="btn bg-gradient-faded-danger mt-4 mb-0 px-5 text-white">Kembali</a>
                        <button type="submit"
                            class="btn bg-gradient-faded-info mt-4 mb-0 px-5 text-white">Simpan</button>
                    </div>
                </div>
            </form>

        </div>

    </section>
    <x-slot name='scripts'>
        <script>
            const session = {!! json_encode($errors->all()) !!};

            console.log(session);

            const dropZone = document.getElementById('drop-zone');
            const imageInput = document.getElementById('image');
            const imagePreviewContainer = document.getElementById('image-preview-container');
            let fileList = []; // Array to track uploaded files

            // Click to open file dialog
            dropZone.addEventListener('click', () => {
                imageInput.click();
            });

            // Drag and drop functionality
            dropZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropZone.classList.add('drop-zone--over');

            });

            dropZone.addEventListener('dragleave', () => {
                dropZone.classList.remove('drop-zone--over');
            });

            dropZone.addEventListener('drop', (event) => {
                event.preventDefault();
                dropZone.classList.remove('drop-zone--over');

                const files = event.dataTransfer.files;

                if (files.length > 0) {
                    handleFiles(files);
                }
            });

            // File input change handler
            imageInput.addEventListener('change', (event) => {
                const files = event.target.files;
                if (files.length > 0) {
                    handleFiles(files);
                }
            });

            // Handle the uploaded files
            function handleFiles(files) {

                // Convert the file list to an array and store in fileList
                fileList = [...fileList, ...Array.from(files)];

                // console.log(fileList);

                // Loop through files and create image previews
                for (const [index, file] of Array.from(files).entries()) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.classList.add('position-relative', 'ratio', 'ratio-1x1', 'w-20', 'border', 'rounded',
                            'rounded-2xl');

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('rounded-2xl', 'img-fluid');
                        img.style.objectFit = 'cover';
                        img.alt = '';

                        const button = document.createElement('button');
                        button.innerHTML = '×'; // Close button
                        button.classList.add('btn', 'btn-danger', 'position-absolute', 'top-0', 'end-0', 'm-1',
                            'rounded-circle');
                        button.style.padding = '0.2rem';
                        button.style.fontSize = '0.8rem';
                        button.style.width = '1.5rem';
                        button.style.height = '1.5rem';
                        button.style.lineHeight = '1rem';
                        button.style.zIndex = '1';

                        button.onclick = function() {
                            imagePreviewContainer.removeChild(div); // Remove image preview
                            fileList.splice(index, 1); // Remove file from array
                            updateImageInput(); // Update the hidden input
                        };

                        div.appendChild(img);
                        div.appendChild(button);
                        imagePreviewContainer.appendChild(div);
                    };
                    reader.readAsDataURL(file);
                }

                updateImageInput();
            }

            // Function to update the hidden input with the current list of files
            function updateImageInput() {
                const imageInputHidden = document.getElementById('image');
                imageInputHidden.files = fileList;
            }
        </script>
    </x-slot>

</x-app-layout>
