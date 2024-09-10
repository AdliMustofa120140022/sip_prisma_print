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
        <div class="p-3 border rounded-md w-full">
            <p class="font-semibold">Apakah saya bisa melihat contoh produk sebelum memesan dalam jumlah besar?
            </p>
            <div class=" ps-4 py-2 w-full text-gray-600">
                <ul class="list-disc ml-5 text-gray-700">
                    <li>
                        Ya, Anda dapat meminta sampel produk sebelum melakukan pemesanan dalam jumlah besar.
                        Silakan hubungi layanan pelanggan kami untuk informasi lebih lanjut.
                    </li>
                </ul>
            </div>
        </div>
    </div>


</x-guest-layout>
