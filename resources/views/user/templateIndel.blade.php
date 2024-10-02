<x-guest-layout>
    <x-slot name="title">
        Payment
    </x-slot>

    <x-slot name="head">

    </x-slot>

    <div class=" w-full">
        <div class="flex gap-3 items-center">
            <a href="{{ route('user.transaksi.index') }}">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Pemabyaran</h2>
        </div>

        <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
            {{-- isi --}}
        </div>

    </div>

    <x-slot name="scripts">

    </x-slot>

</x-guest-layout>
