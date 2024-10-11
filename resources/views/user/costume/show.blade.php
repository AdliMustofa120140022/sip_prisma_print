<x-guest-layout>
    <x-slot name="title">
        Detail Pesanan Kostum
    </x-slot>

    <div class=" w-full">
        <div class="flex gap-3 items-center">
            <a href="{{ url()->previous() }}">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Detail Pesanan Kostume</h2>
        </div>




        <form method="POST" enctype="multipart/form-data" action=""
            class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
            @csrf
            <h1 class="text-xl font-semibold text-center pb-10">Detail Pesanan Kostum</h1>

            <h2 class="text-lg font-semibold">Informasi Transaksi</h2>
            <div class="flex justify-between">
                <spa>Transaksi Code</spa\ <span>{{ $transaksi->transaksi_code }}</span>
            </div>
            <div class="flex justify-between">
                <span>Status</span>
                @if ($transaksi->costume_transaksi->status == 'pending')
                    <span class="px-3  rounded-full text-sm font-semibold bg-orange-100 text-orange-600">
                        Menunggu Persetujuan
                    </span>
                @elseif($transaksi->costume_transaksi->status == 'approved')
                    <span class="px-3  rounded-full text-sm font-semibold bg-green-100 text-green-600">
                        Disetujui
                    </span>
                @elseif($transaksi->costume_transaksi->status == 'rejected')
                    <span class="px-3  rounded-full text-sm font-semibold bg-red-100 text-red-600">
                        Ditolak
                    </span>
                @endif
            </div>
            @if ($transaksi->costume_transaksi->status == 'approved')
                <div class="flex justify-between">
                    <span>Estimasi Harga</span>
                    <span>{{ $transaksi->costume_transaksi->harga }}</span>
                </div>
            @elseif ($transaksi->costume_transaksi->status == 'rejected')
                <div class="flex justify-between">
                    <span>Estimasi Harga</span>
                    <span>{{ $transaksi->costume_transaksi->note }}</span>
                </div>
            @endif


            <h2 class="text-lg mt-5 font-semibold">Informasi Produk</h2>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="product_name" class="col-span-1 text-sm font-semibold text-gray-700">
                    Nama Produk<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="product_name" name="product_name"
                        class="w-full px-4 py-2 border rounded-md" placeholder="Nama Produk"
                        value="{{ $transaksi->costume_transaksi->product_name }}" disabled>
                </div>
            </div>


            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="category_id" class="col-span-1 text-sm font-semibold text-gray-700">
                    Katagori<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <select name="category_id" id="category" class="w-full px-4 py-2 border rounded-md " disabled>
                        <option selected value="{{ $transaksi->costume_transaksi->category_id }}">
                            {{ $transaksi->costume_transaksi->katagori->nama }}</option>
                    </select>
                </div>
            </div>


            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="sub_kategori_id" class="col-span-1 text-sm font-semibold text-gray-700">
                    Sub Katagori<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <select name="sub_kategori_id" id="sub_katagori" class="w-full px-4 py-2 border rounded-md "
                        disabled>
                        <option value="{{ $transaksi->costume_transaksi->sub_katagori->id }}">
                            {{ $transaksi->costume_transaksi->sub_katagori->name }}</option>
                    </select>
                </div>
            </div>



            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="theme" class="col-span-1 text-sm font-semibold text-gray-700">
                    Tema<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="theme" name="theme" placeholder="Tema"
                        class="w-full px-4 py-2 border rounded-md " value="{{ $transaksi->costume_transaksi->theme }}"
                        disabled>
                </div>
            </div>


            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="length_cm" class="col-span-1 text-sm font-semibold text-gray-700">
                    Ukuran Panjang (cm)<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="number" step="0.01" id="length_cm" name="length_cm" placeholder="Panjang Produk"
                        class="w-full px-4 py-2 border rounded-md "
                        value="{{ $transaksi->costume_transaksi->length_cm }}" disabled>
                </div>
            </div>


            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="width_cm" class="col-span-1 text-sm font-semibold text-gray-700">
                    Ukuran Lebar (cm)<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="number" step="0.01" id="width_cm" name="width_cm" placeholder="Lebar Produk"
                        class="w-full px-4 py-2 border rounded-md "
                        value="{{ $transaksi->costume_transaksi->width_cm }}">
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="height_gram" class="col-span-1 text-sm font-semibold text-gray-700">
                    Ukuran Tinggi (cm)<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="number" step="0.01" id="height_gram" name="height_gram"
                        class="w-full px-4 py-2 border rounded-md " placeholder="Tinggi Produk"
                        value="{{ $transaksi->costume_transaksi->height_gram }}" disabled>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="thickness_cm" class="col-span-1 text-sm font-semibold text-gray-700">
                    Ketebalan (cm)
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="number" step="0.01" id="thickness_cm" name="thickness_cm"
                        class="w-full px-4 py-2 border rounded-md " placeholder="Ketebalan"
                        value="{{ $transaksi->costume_transaksi->thickness_cm }}" disabled>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="sheet_count" class="col-span-1 text-sm font-semibold text-gray-700">
                    jumlah Lembar
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="number" id="sheet_count" placeholder="Jumlah Lebar produk" name="sheet_count"
                        class="w-full px-4 py-2 border rounded-md "
                        value="{{ $transaksi->costume_transaksi->sheet_count }}" disabled>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="material" class="col-span-1 text-sm font-semibold text-gray-700">
                    Bahan<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="material" name="material" placeholder="Bahan Produk"
                        class="w-full px-4 py-2 border rounded-md "
                        value="{{ $transaksi->costume_transaksi->material }}" disabled>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="color" class="col-span-1 text-sm font-semibold text-gray-700">
                    Warna<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="color" name="color" placeholder="Warna Produk"
                        class="w-full px-4 py-2 border rounded-md "
                        value="{{ $transaksi->costume_transaksi->color }}" disabled>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="print_type" class="col-span-1 text-sm font-semibold text-gray-700">
                    Jenis Cetakan<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="print_type" name="print_type"
                        class="w-full px-4 py-2 border rounded-md " placeholder="Jeni Cetakan"
                        value="{{ $transaksi->costume_transaksi->print_type }}" disabled>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="print_resolution" class="col-span-1 text-sm font-semibold text-gray-700">
                    Resolusi Cetak
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="print_resolution" name="print_resolution"
                        class="w-full px-4 py-2 border rounded-md " placeholder="Resolusi Cetakan"
                        value="{{ $transaksi->costume_transaksi->print_resolution }}" disabled>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="finishing" class="col-span-1 text-sm font-semibold text-gray-700">
                    Finishing<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="finishing" name="finishing"
                        class="w-full px-4 py-2 border rounded-md " placeholder="Finishing"
                        value="{{ $transaksi->costume_transaksi->finishing }}" disabled>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="ink_type" class="col-span-1 text-sm font-semibold text-gray-700">
                    Tinta Yang Digunakan<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="ink_type" name="ink_type" placeholder="Jenis Titna Cetak"
                        class="w-full px-4 py-2 border rounded-md "
                        value="{{ $transaksi->costume_transaksi->ink_type }}" disabled>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="order_quantity" class="col-span-1 text-sm font-semibold text-gray-700">
                    Jumlah Pesanan<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="number" id="order_quantity" name="order_quantity"
                        class="w-full px-4 py-2 border rounded-md " placeholder="Jumlah Pesanan"
                        value="{{ $transaksi->costume_transaksi->order_quantity }}" disabled>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="unit" class="col-span-1 text-sm font-semibold text-gray-700">
                    Satuan Pesanan<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="unit" name="unit" placeholder="Satuan pesanan"
                        class="w-full px-4 py-2 border rounded-md " value="{{ $transaksi->costume_transaksi->unit }}"
                        disabled>
                </div>
            </div>


            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="usage_deadline" class="col-span-1 text-sm font-semibold text-gray-700">
                    Waktu Penggunaan
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="date" id="usage_deadline" name="usage_deadline"
                        class="w-full px-4 py-2 border rounded-md" placeholder="Waktu Penggunaan"
                        value="{{ $transaksi->costume_transaksi->usage_deadline }}" disabled>
                </div>
            </div>



            {{-- <x-utils.btn-submit text="Buat Pesanan kostume" /> --}}

        </form>
    </div>

    <x-slot name="scripts">
        <script>
            // var categories = null;

            // function getSubCategory() {
            //     const categoryId = document.getElementById('category').value;
            //     const subCategorySelect = document.getElementById('sub_katagori');

            //     // Kosongkan opsi sub-kategori saat kategori berubah
            //     subCategorySelect.innerHTML = '<option value="">Pilih Sub Kategori</option>';

            //     // Cari kategori yang sesuai dengan ID yang dipilih
            //     const selectedCategory = categories.find(cat => cat.id == categoryId);
            //     // Jika kategori ditemukan, tampilkan opsi sub-kategori
            //     if (selectedCategory && selectedCategory.sub_katagori) {
            //         selectedCategory.sub_katagori.forEach(sub => {
            //             console.log(sub.name);
            //             subCategorySelect.innerHTML += `<option value="${sub.id}">${sub.name}</option>`;

            //         });
            //     }
            // }
        </script>
    </x-slot>
</x-guest-layout>
