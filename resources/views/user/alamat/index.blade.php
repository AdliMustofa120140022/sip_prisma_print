<x-guest-layout>
    <x-slot name="title">
        alamat
    </x-slot>


    <div class=" w-full">
        <div class="flex gap-3 items-center">
            <a href="{{ url()->previous() }}">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Check Out Pesanan</h2>
        </div>
        <div class="p-3 mx-3 border rounded-md w-full">
            {{-- conten --}}
        </div>
    </div>


</x-guest-layout>
