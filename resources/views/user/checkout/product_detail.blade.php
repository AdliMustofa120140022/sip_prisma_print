<x-guest-layout>
    <x-slot name="title">
        Check produck Detail
    </x-slot>

    <div class=" w-full">
        <div class="flex gap-3 items-center">
            <a href="{{ session()->get('prev_url') !== null ? session()->get('prev_url') : url()->previous() }}">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Buat Pesanan</h2>
        </div>


        <form method="POST" enctype="multipart/form-data"
            action="{{ route('user.checkout.update_produck_transaksi', $produk_transaksi->id) }}"
            class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
            @csrf
            <h1 class="text-xl font-semibold text-center pb-10">Buat Pesanan Sesuai Katalog</h1>
            <h2 class="text-lg font-semibold">Informasi Produk</h2>
            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                    Nama Produk
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="nama_product" name="nama_product"
                        class="w-full px-4 py-2 border rounded-md bg-gray-100"
                        value="{{ $produk_transaksi->transaksi->tansaktion_type == 'costume' ? $produk_transaksi->transaksi->costume_transaksi->product_name : $produk_transaksi->produck->name }}"
                        readonly>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                    Katagori
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="nama_product" name="nama_product"
                        class="w-full px-4 py-2 border rounded-md bg-gray-100"
                        value="{{ $produk_transaksi->transaksi->tansaktion_type == 'costume' ? $produk_transaksi->transaksi->costume_transaksi->katagori->nama : $produk_transaksi->produck->sub_katagori->katagori->nama }}"
                        readonly>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                    Sub Katagori
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="nama_product" name="nama_product"
                        class="w-full px-4 py-2 border rounded-md bg-gray-100"
                        value="{{ $produk_transaksi->transaksi->tansaktion_type == 'costume' ? $produk_transaksi->transaksi->costume_transaksi->sub_katagori->name : $produk_transaksi->produck->sub_katagori->name }}"
                        readonly>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                    Upload Dokumen Pendukung
                </label>
                <div x-data="{ fileName: '' }" class="col-span-2 space-y-4">
                    <label class="block">
                        <input type="file" name="doc_pendukung" class="hidden"
                            @change="fileName = $event.target.files[0].name">
                        <div
                            class="flex items-center justify-between px-4 py-2 border border-gray-300 rounded-md cursor-pointer bg-white">
                            <span x-text="fileName || 'Pilih file'"></span>
                            <span class="text-gray-500 text-xs">Unggah dokumen pendukung</span>
                        </div>
                    </label>
                    <p class="text-xs text-gray-500 mt-1">Maksimal ukuran file 100MB. Jika tidak bisa diunggah,
                        gunakan link Google Drive</p>
                    @error('doc_pendukung')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-5">
                <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                    Link Google Drive
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-200 focus:border-blue-500"
                        name="link"
                        value="{{ $produk_transaksi->doc_pendukung ? $produk_transaksi->doc_pendukung->link : '' }}"
                        placeholder="Jika ada beberapa berkas, masukkan link Google Drive (akses terbuka)">
                    <p class="text-xs text-gray-500">Pastikan link Google Drive yang diberikan memiliki akses terbuka
                    </p>
                    @error('link')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-3 gap-8 py-5">
                <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                    Catatan <span class="text-red-600">*</span>
                </label>
                <div class="col-span-2 space-y-4">
                    <textarea
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-200 focus:border-blue-500"
                        rows="4" name="catatan"
                        placeholder="Masukkan catatan pesanan seperti nama yang ingin dimasukkan ke dalam produk atau informasi penting lainnya">{{ $produk_transaksi->doc_pendukung ? $produk_transaksi->doc_pendukung->catatan : null }}</textarea>
                    @error('catatan')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <x-utils.btn-submit text="Simpan" />

        </form>
    </div>c
</x-guest-layout>
