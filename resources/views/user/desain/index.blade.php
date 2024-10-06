@php
    use Carbon\Carbon;
@endphp

<x-guest-layout>
    <x-slot name="title">
        Desain
    </x-slot>

    <div class=" w-full">
        <div class="flex gap-3 items-center">
            <a href="{{ route('user.transaksi.index') }}">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Desain Produk</h2>
        </div>

        <div class="max-w-5xl mx-auto bg-white py-6 px-14 rounded-lg shadow-md">
            {{-- isi --}}

            <h2 class="text-xl font-semibold text-center mb-4">Informasi Transaksi</h2>

            <div class="border-b pb-4 mb-4">
                <h2 class="text-lg font-semibold text-blue-600">Batas Akhir Konfirmasi Desain</h2>
                <p class="text-sm text-gray-600">
                <p class="text-md font-semibold text-blue-950">
                    {{ Carbon::parse($transaksi->transaksi_data->desain_time)->addDay()->format('Y-m-d H:i:s') }}</p>
                </p>
            </div>


            <div class="flex justify-between">
                <span>Nomor Pesanan</span>
                <span>{{ $transaksi->transaksi_code }}</span>
            </div>
            <div class="flex justify-between">
                <span>Tanggal Pesanan</span>
                <span>{{ $transaksi->created_at }}</span>
            </div>
            @foreach ($transaksi->produk_transaksi as $produk_transaksi)
                <h2 class="text-lg font-semibold  mt-4">Produk {{ $loop->iteration }}</h2>
                <div class="flex justify-between">
                    <span>Produk</span>
                    <span>{{ $produk_transaksi->produck->name }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Katagori</span>
                    <span>{{ $produk_transaksi->produck->sub_katagori->katagori->nama }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Sub katagori</span>
                    <span>{{ $produk_transaksi->produck->sub_katagori->name }}</span>
                </div>
                @if ($produk_transaksi->desain_produk_transaksi->status == 'approved')
                    <div class="flex justify-between">
                        <span>Status Desain</span>
                        <span class="text-green-600 font-semibold">Disetujui</span>
                    </div>
                @endif
                <div class="flex justify-between">
                    <span>Desain Produk</span>
                    <a download
                        href="{{ asset('storage/desain_produk/' . $produk_transaksi->desain_produk_transaksi->desain) }}"
                        class="font-semibold">Download Desain</a>
                </div>
                <div class="my-4">
                    <div class="w-full min-h-56 bg-gray-200 flex items-center justify-center mt-2 rounded-lg">
                        <img src="{{ asset('storage/desain_produk/' . $produk_transaksi->desain_produk_transaksi->desain) }}"
                            alt="desain{{ $loop->iteration }}">
                    </div>
                </div>
                @if ($produk_transaksi->desain_produk_transaksi->status == 'pending')
                    <form action="{{ route('user.desain.confirm', $produk_transaksi->desain_produk_transaksi->id) }}"
                        method="POST" id="form{{ $loop->iteration }}" enctype="multipart/form-data">
                        @csrf
                        <label for="catatan" class="text-sm text-gray-500">Catatan</label>
                        <textarea id="catatan" name="catatan" class="w-full border border-gray-300 rounded-md p-2 mt-2" rows="3"
                            placeholder="Masukkan catatan atau perbaikan jika ada kesalahan atau ketidaksesuaian pada desain pesanan"></textarea>
                        <p class="text-xs text-red-500 mt-1">Perbaikan desain dilakukan maksimal 2 kali. Gunakan
                            kesempatan
                            konfirmasi dengan baik dan periksa pesanan Anda dengan teliti.</p>

                        <input type="text" id="status{{ $loop->iteration }}" name="status" class="hidden">
                        <div class="justify-center flex items-center gap-6 text-center mt-4">
                            <button type="button" onclick="setuju({{ $loop->iteration }})"
                                class="px-6 py-2 bg-green-600 text-white w-56 rounded-md hover:bg-green-700">Setuju</button>
                            <button type="button" onclick="tolak({{ $loop->iteration }})"
                                class="px-6 py-2 bg-red-600 text-white w-56 rounded-md hover:bg-red-700">Total</button>
                        </div>
                    </form>
                @endif
            @endforeach
        </div>

    </div>

    <x-slot name="scripts">
        <script>
            function setuju(target) {
                document.getElementById(`status${target}`).value = 'approved';

                //submit form
                document.getElementById(`form${target}`).submit();
            }

            function tolak(target) {
                document.getElementById(`status${target}`).value = 'rejected';

                //submit form
                document.getElementById(`form${target}`).submit();
            }
        </script>
    </x-slot>

</x-guest-layout>
