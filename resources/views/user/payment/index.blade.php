@php
    use Carbon\Carbon;
@endphp

<x-guest-layout>
    <x-slot name="title">
        Payment
    </x-slot>

    <div class=" w-full">
        <div class="flex gap-3 items-center">
            <a href="{{ route('user.transaksi.index') }}">
                <i class="fa-solid fa-arrow-left text-lg px-3"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Pemabyaran</h2>
        </div>

        <div class="max-w-5xl mx-auto bg-white py-6 px-5 md:px-14 rounded-lg shadow-md">
            {{-- isi --}}

            <h2 class="text-xl font-semibold text-center mb-4">Informasi Pembayaran</h2>


            <div class="grid grid-cols-5 py-2">
                <div class="col-span-2">
                    <p class="text-md font-semibold">Nomor Transaksi</p>
                </div>
                <div class="col-span-3">
                    <p class="text-md font-semibold text-blue-950">{{ $transaksi->transaksi_code }}</p>
                </div>
            </div>
            <div class="grid grid-cols-5 py-2">
                <div class="col-span-2">
                    <p class="text-md font-semibold">Tanggal pesana</p>
                </div>
                <div class="col-span-3">
                    <p class="text-md font-semibold text-blue-950">{{ $transaksi->created_at }}</p>
                </div>
            </div>
            @if ($transaksi->status == 'payment' && $transaksi->transaksi_data->payment_status != 'approved')
                <div class="grid grid-cols-5 py-2">
                    <div class="col-span-2">
                        <p class="text-md font-semibold">Batas Akhir Pembayaran</p>
                    </div>
                    <div class="col-span-3">
                        <p class="text-md font-semibold text-blue-950">
                            {{ Carbon::parse($transaksi->created_at)->addDay()->format('Y-m-d H:i:s') }}</p>
                    </div>
                </div>
            @endif
            <div class="grid grid-cols-5 py-2">
                <div class="col-span-2">
                    <p class="text-md font-semibold">Status Pembayaran</p>
                </div>
                <div class="col-span-3">
                    @if ($transaksi->transaksi_data->payment_status == 'unpaid')
                        <div
                            class="px-3 py-1 my-2 text-center rounded-full text-sm font-semibold bg-red-100 text-red-600">
                            Belum Dibayar
                        </div>
                    @elseif ($transaksi->transaksi_data->payment_status == 'pending')
                        <div
                            class="px-3 py-1 my-2 text-center rounded-full text-sm font-semibold bg-orange-100 text-orange-600">
                            Menunggu Persetujuan
                        </div>
                    @elseif($transaksi->transaksi_data->payment_status == 'approved')
                        <div
                            class="px-3 py-1 my-2 text-center rounded-full text-sm font-semibold bg-green-100 text-green-600">
                            Lunas
                        </div>
                    @elseif($transaksi->transaksi_data->payment_status == 'rejected')
                        <div
                            class="px-3 py-1 my-2 text-center rounded-full text-sm font-semibold bg-red-100 text-red-600">
                            Ditolak
                        </div>
                    @endif
                </div>
            </div>
            <div class="grid grid-cols-5 py-2">
                <div class="col-span-2">
                    <p class="text-md font-semibold">Jumlah Pembayaran</p>
                </div>
                <div class="col-span-3">
                    <p class="text-md font-semibold text-blue-950">
                        Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="grid grid-cols-5 py-2">
                <div class="col-span-2">
                    <p class="text-md font-semibold">Metode Pembayaran</p>
                </div>
                <div class="col-span-3">
                    <p class="text-md font-semibold text-blue-950">
                        {{ $transaksi->transaksi_data->payment_metode->name }} </p>
                </div>
            </div>
            @if (
                $transaksi->status == 'payment' &&
                    ($transaksi->transaksi_data->payment_metode->type == 'bank' ||
                        $transaksi->transaksi_data->payment_metode->type == 'wallet'))
                <div class="grid grid-cols-5 py-2">
                    <div class="col-span-2">
                        <p class="text-md font-semibold">Nomor Rekening</p>
                    </div>
                    <div class="col-span-3">
                        <p class="text-md font-semibold text-blue-950">
                            {{ $transaksi->transaksi_data->payment_metode->rekening }}
                        </p>
                    </div>
                </div>
            @endif
            <form action="{{ route('user.payment.store', $transaksi->transaksi_code) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-5 py-2">
                    <div class="col-span-2">
                        <label for="bukti_pembayaran" class="text-md font-semibold">Bukit Transaksi</label>
                    </div>
                    <div class="col-span-5 md:col-span-3">
                        <div x-data="{ fileName: '' }" class="col-span-2 space-y-4">
                            <label class="block">
                                <input type="file" name="bukti_pembayaran" class="hidden" accept=".jpg,.jpeg,.png"
                                    @change="fileName = $event.target.files[0].name">
                                <div
                                    class="flex items-center justify-between px-4 py-2 border border-gray-300 rounded-md cursor-pointer bg-white">
                                    <span x-text="fileName || 'Pilih file'"></span>
                                    <span class="text-gray-500 text-xs">Unggah Bukti Transaksi</span>
                                </div>
                            </label>
                            <p class="text-xs text-gray-500 mt-1">Maksimal ukuran file 1MB. (.jpg/.jpeg/.png)</p>
                        </div>
                        @error('bukti_pembayaran')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                @if ($transaksi->status == 'payment' && $transaksi->transaksi_data->payment_status == 'rejected')
                    <div class="grid grid-cols-5 py-2">
                        <div class="col-span-2">
                            <p class="text-md font-semibold">Catatan</p>
                        </div>
                        <div class="col-span-5 md:col-span-3">
                            <p class="text-md font-semibold text-red-500">
                                {{ $transaksi->transaksi_data->payment_note }}
                            </p>
                        </div>
                    </div>
                @endif

                @if ($transaksi->status == 'payment' && $transaksi->transaksi_data->payment_metode->type == 'qris')
                    <div class="grid grid-cols-5 py-2">
                        <div class="col-span-2">
                            <p class="text-md font-semibold">QRIS</p>
                        </div>
                        {{-- <div class="col-span-5">
                        <img src="{{ asset('storage/payment_metode/' . $transaksi->transaksi_data->payment_metode->qris) }}"
                            alt="qris" class="w-32 h-32">
                    </div> --}}
                        <div
                            class="col-span-5 md:col-span-3 card-body d-flex align-items-center justify-content-center">
                            <img src="{{ asset('storage/payment_metode/' . $transaksi->transaksi_data->payment_metode->qr_code) }}"
                                class="img-fluid rounded shadow" style="" alt="qris">
                        </div>
                    </div>
                @endif


                <div class="justify-center items-center flex flex-col gap-6 text-center mt-4">
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white w-56 rounded-md hover:bg-blue-700">Konfirmasi
                        Pembayaran</button>

                    <a href=""
                        class=" bg-gray-200 text-black px-4 py-2 w-56 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">Download
                        Invoice</a>

                </div>

            </form>


        </div>

    </div>

</x-guest-layout>
