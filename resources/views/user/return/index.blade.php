<x-guest-layout>
    <x-slot name="title">
        Pengajuan Retur
    </x-slot>

    <div class=" w-full">
        <div class="flex gap-3 items-center">
            <a href="{{ session()->get('prev_url') !== null ? session()->get('prev_url') : url()->previous() }}">
                <i class="fa-solid fa-arrow-left text-lg px-3"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Pengajuan Retur</h2>
        </div>


        <form method="POST" enctype="multipart/form-data" action="{{ route('user.return.store', $transaksi->id) }}"
            class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
            @csrf
            <h1 class="text-xl font-semibold text-center pb-10">Pengajuan Retur</h1>
            <h2 class="text-lg font-semibold">Informasi Produk</h2>
            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                    Nomor Pesanan
                </label>
                <div class="col-span-2 space-y-4">
                    <input type="text" id="nama_product" name="nama_product"
                        class="w-full px-4 py-2 border rounded-md bg-gray-100" value="{{ $transaksi->transaksi_code }}"
                        readonly>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-8 py-2">
                <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                    Upload Bukti Pendukung
                </label>
                <div x-data="{ fileName: '' }" class="col-span-2 space-y-4">
                    <label class="block">
                        <input type="file" name="bukti" class="hidden"
                            @change="fileName = $event.target.files[0].name">
                        <div
                            class="flex items-center justify-between px-4 py-2 border border-gray-300 rounded-md cursor-pointer bg-white">
                            <span x-text="fileName || 'Pilih file'"></span>
                            <span class="text-gray-500 text-xs">Unggah Bukti Pendukung</span>
                        </div>
                    </label>
                    <p class="text-xs text-gray-500 mt-1">Maksimal ukuran file 20MB.</p>
                </div>
            </div>

            @error('bukti')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-3 gap-8 py-5">
                <label for="nama_product" class="col-span-1 text-sm font-semibold text-gray-700">
                    Catatan
                </label>
                <div class="col-span-2 space-y-4">
                    <textarea class="w-full px-4 py-2 border rounded-md" rows="4" name="alasan"
                        placeholder="Alasan Pengajuan Return">{{ old('alasan') }}</textarea>
                </div>
                @error('alasan')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <x-utils.btn-submit text="Simpan" />

        </form>
    </div>c
</x-guest-layout>
