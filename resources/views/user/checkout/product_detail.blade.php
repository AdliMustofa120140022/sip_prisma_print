<x-guest-layout>
    <x-slot name="title">
        Checkout
    </x-slot>

    <div class=" w-full">
        <div class="flex gap-3 items-center">
            <a href="{{ url()->previous() }}">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Check Out Pesanan</h2>
        </div>


        <form method="POST" action="" class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
            @csrf

            <h1 class="text-xl font-semibold text-center pb-10">Buat Pesanan Sesuai Katalog</h1>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                    Informasi Produk
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="nama_product" name="nama_product"
                        class="w-full px-4 py-2 border rounded-md bg-gray-100" value="Undangan Pernikahan Model 012A"
                        readonly>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                    Nama Produk
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="nama_product" name="nama_product"
                        class="w-full px-4 py-2 border rounded-md bg-gray-100" value="Undangan Pernikahan Model 012A"
                        readonly>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                    Katagori
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="nama_product" name="nama_product"
                        class="w-full px-4 py-2 border rounded-md bg-gray-100" value="Undangan Pernikahan Model 012A"
                        readonly>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                    Sub Katagori
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="nama_product" name="nama_product"
                        class="w-full px-4 py-2 border rounded-md bg-gray-100" value="Undangan Pernikahan Model 012A"
                        readonly>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                    Upload Dokumen Pendukung
                </label>
                <div x-data="{ fileName: '' }" class="col-span-2 space-y-4">
                    <label class="block">
                        <input type="file" class="hidden" @change="fileName = $event.target.files[0].name">
                        <div
                            class="flex items-center justify-between px-4 py-2 border rounded-md cursor-pointer bg-gray-100">
                            <span x-text="fileName || 'Pilih file'"></span>
                            <span class="text-gray-500 text-xs">Unggah dokumen pendukung</span>
                        </div>
                    </label>
                    <p class="text-xs text-gray-500 mt-1">Maksimal ukuran file 300MB. Jika tidak bisa diunggah,
                        gunakan link Google Drive</p>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-5">
                <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                    Link Google Drive
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" class="w-full px-4 py-2 border rounded-md"
                        placeholder="Jika ada beberapa berkas, masukkan link Google Drive (akses terbuka)">
                    <p class="text-xs text-gray-500">Pastikan link Google Drive yang diberikan memiliki akses terbuka
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-8 py-5">
                <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                    Catatan
                </label>
                <div class="col-span-2 space-y-4">
                    <textarea class="w-full px-4 py-2 border rounded-md" rows="4"
                        placeholder="Masukkan catatan pesanan seperti nama yang ingin dimasukkan ke dalam produk atau informasi penting lainnya"></textarea>
                </div>
            </div>

            <x-utils.btn-submit text="Simpan" />

        </form>
    </div>c
</x-guest-layout>
