<x-guest-layout>
    <x-slot name="title">
        Pesanan Kostum
    </x-slot>

    <div class=" w-full">
        <div class="flex gap-3 items-center">
            <a href="{{ url()->previous() }}">
                <i class="fa-solid fa-arrow-left text-lg px-3"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Buat Pesanan Kostume</h2>
        </div>


        <form method="POST" enctype="multipart/form-data" action="{{ route('user.costume.store') }}"
            class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
            @csrf
            <h1 class="text-xl font-semibold text-center pb-10">Buat Pesanan Kostum</h1>
            <h2 class="text-lg font-semibold">Informasi Produk</h2>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="product_name" class="col-span-1 text-sm font-semibold text-gray-700">
                    Nama Produk<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="product_name" name="product_name"
                        class="w-full px-4 py-2 border rounded-md" placeholder="Nama Produk"
                        value="{{ old('product_name') }}">
                </div>
            </div>
            @error('product_name')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="category_id" class="col-span-1 text-sm font-semibold text-gray-700">
                    Katagori<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <select name="category_id" id="category" class="w-full px-4 py-2 border rounded-md "
                        onchange="getSubCategory()">
                        <option value="">Pilih Katagori</option>
                        @foreach ($katagoris as $katagori)
                            <option value="{{ $katagori->id }}">{{ $katagori->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @error('category_id')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="sub_kategori_id" class="col-span-1 text-sm font-semibold text-gray-700">
                    Sub Katagori<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <select name="sub_kategori_id" id="sub_katagori" class="w-full px-4 py-2 border rounded-md ">
                        <option value="">Pilih Sub Katagori</option>
                    </select>
                </div>
            </div>
            @error('sub_kategori_id')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror


            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="theme" class="col-span-1 text-sm font-semibold text-gray-700">
                    Tema<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="theme" name="theme" placeholder="Tema"
                        class="w-full px-4 py-2 border rounded-md " value="{{ old('theme') }}">
                </div>
            </div>
            @error('theme')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="length_cm" class="col-span-1 text-sm font-semibold text-gray-700">
                    Ukuran Panjang (cm)<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="number" step="0.01" id="length_cm" name="length_cm" placeholder="Panjang Produk"
                        class="w-full px-4 py-2 border rounded-md " value="{{ old('length_cm') }}">
                </div>
            </div>
            @error('length_cm')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="width_cm" class="col-span-1 text-sm font-semibold text-gray-700">
                    Ukuran Lebar (cm)<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="number" step="0.01" id="width_cm" name="width_cm" placeholder="Lebar Produk"
                        class="w-full px-4 py-2 border rounded-md " value="{{ old('width_cm') }}">
                </div>
            </div>
            @error('width_cm')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="height_gram" class="col-span-1 text-sm font-semibold text-gray-700">
                    Ukuran Tinggi (cm)<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="number" step="0.01" id="height_gram" name="height_gram"
                        class="w-full px-4 py-2 border rounded-md " placeholder="Tinggi Produk"
                        value="{{ old('height_gram') }}">
                </div>
            </div>
            @error('height_gram')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="thickness_cm" class="col-span-1 text-sm font-semibold text-gray-700">
                    Ketebalan (cm)
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="number" step="0.01" id="thickness_cm" name="thickness_cm"
                        class="w-full px-4 py-2 border rounded-md " placeholder="berat Produk"
                        value="{{ old('thickness_cm') }}">
                </div>
            </div>
            @error('thickness_cm')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror


            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="thickness_cm" class="col-span-1 text-sm font-semibold text-gray-700">
                    Ketebalan (cm)
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="number" step="0.01" id="thickness_cm" name="thickness_cm"
                        class="w-full px-4 py-2 border rounded-md " placeholder="Ketebalan"
                        value="{{ old('thickness_cm') }}">
                </div>
            </div>
            @error('thickness_cm')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="sheet_count" class="col-span-1 text-sm font-semibold text-gray-700">
                    jumlah Lembar
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="number" id="sheet_count" placeholder="Jumlah Lebar produk" name="sheet_count"
                        class="w-full px-4 py-2 border rounded-md " value="{{ old('sheet_count') }}">
                </div>
            </div>
            @error('sheet_count')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="material" class="col-span-1 text-sm font-semibold text-gray-700">
                    Bahan<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="material" name="material" placeholder="Bahan Produk"
                        class="w-full px-4 py-2 border rounded-md " value="{{ old('material') }}">
                </div>
            </div>
            @error('material')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="color" class="col-span-1 text-sm font-semibold text-gray-700">
                    Warna<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="color" name="color" placeholder="Warna Produk"
                        class="w-full px-4 py-2 border rounded-md " value="{{ old('color') }}">
                </div>
            </div>
            @error('color')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="print_type" class="col-span-1 text-sm font-semibold text-gray-700">
                    Jenis Cetakan<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="print_type" name="print_type"
                        class="w-full px-4 py-2 border rounded-md " placeholder="Jeni Cetakan"
                        value="{{ old('print_type') }}">
                </div>
            </div>
            @error('print_type')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="print_resolution" class="col-span-1 text-sm font-semibold text-gray-700">
                    Resolusi Cetak
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="print_resolution" name="print_resolution"
                        class="w-full px-4 py-2 border rounded-md " placeholder="Resolusi Cetakan"
                        value="{{ old('print_resolution') }}">
                </div>
            </div>
            @error('print_resolution')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="finishing" class="col-span-1 text-sm font-semibold text-gray-700">
                    Finishing<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="finishing" name="finishing"
                        class="w-full px-4 py-2 border rounded-md " placeholder="Finishing"
                        value="{{ old('finishing') }}">
                </div>
            </div>
            @error('finishing')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="ink_type" class="col-span-1 text-sm font-semibold text-gray-700">
                    Tinta Yang Digunakan<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="ink_type" name="ink_type" placeholder="Jenis Titna Cetak"
                        class="w-full px-4 py-2 border rounded-md " value="{{ old('ink_type') }}">
                </div>
            </div>
            @error('ink_type')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="order_quantity" class="col-span-1 text-sm font-semibold text-gray-700">
                    Jumlah Pesanan<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="number" id="order_quantity" name="order_quantity"
                        class="w-full px-4 py-2 border rounded-md " placeholder="Jumlah Pesanan"
                        value="{{ old('order_quantity') }}">
                </div>
            </div>
            @error('order_quantity')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="unit" class="col-span-1 text-sm font-semibold text-gray-700">
                    Satuan Pesanan<span class="text-red-600 font-semibold text-lg">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="unit" name="unit" placeholder="Satuan pesanan"
                        class="w-full px-4 py-2 border rounded-md " value="{{ old('unit') }}">
                </div>
            </div>
            @error('unit')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="usage_deadline" class="col-span-1 text-sm font-semibold text-gray-700">
                    Waktu Penggunaan
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="date" id="usage_deadline" name="usage_deadline"
                        class="w-full px-4 py-2 border rounded-md" placeholder="Waktu Penggunaan"
                        value="{{ old('usage_deadline') }}">
                </div>
            </div>
            @error('usage_deadline')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror



            <x-utils.btn-submit text="Buat Pesanan kostume" />

        </form>
    </div>

    <x-slot name="scripts">
        <script>
            var categories = @json($katagoris);



            function getSubCategory() {
                const categoryId = document.getElementById('category').value;
                const subCategorySelect = document.getElementById('sub_katagori');

                // Kosongkan opsi sub-kategori saat kategori berubah
                subCategorySelect.innerHTML = '<option value="">Pilih Sub Kategori</option>';

                // Cari kategori yang sesuai dengan ID yang dipilih
                const selectedCategory = categories.find(cat => cat.id == categoryId);
                // Jika kategori ditemukan, tampilkan opsi sub-kategori
                if (selectedCategory && selectedCategory.sub_katagori) {
                    selectedCategory.sub_katagori.forEach(sub => {
                        console.log(sub.name);
                        subCategorySelect.innerHTML += `<option value="${sub.id}">${sub.name}</option>`;

                    });
                }
            }
        </script>
    </x-slot>
</x-guest-layout>
