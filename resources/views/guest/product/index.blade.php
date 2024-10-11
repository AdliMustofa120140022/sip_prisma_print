<x-guest-layout>
    <x-slot name="title"> Product</x-slot>

    <section class="container mx-auto px-3">
        {{-- <x-product-sidebar :param='$params' /> --}}
        <div class="flex items-center space-x-4 p-4 flex-wrap justify-between gap-5">
            <!-- Button -->
            <a href="{{ route('user.costume.index') }}"
                class="bg-blue-500 hover:bg-blue-600  text-white font-bold py-2 px-4 rounded-full whitespace-nowrap">
                Buat Pesanan Kustom
            </a>

            <!-- Sort Dropdown -->
            <div class="relative" x-data='{openShort: false}'>
                <button @click="openShort = !openShort"
                    class="flex gap-3 items-center  bg-white border border-gray-300 rounded-full px-4 py-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 16L7 20M7 20L11 16M7 20V4M11 4H21M11 8H18M11 12H15" stroke="#707070"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="font-semibold text-gray-700">Sort</span>
                </button>
                <div x-show="openShort"
                    class="z-50 px-3 translate-y-1 -translate-x-0 text-sm text-gray-600 absolute bg-gray-200 rounded-xl border border-gray-300 shadow text-center transition-all duration-300 ease-in-out"
                    x-transition:enter="transition transform ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition transform ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                    <div class="">
                        <a href="{{ route('guest.product', ['order' => 'asc']) }}"
                            class="flex items-center gap-2 my-2 py-2 px-4 bg-slate-100 rounded-full hover:bg-slate-300">
                            <i class="fa-solid fa-arrow-up"></i>
                            <span>Asc</span>
                        </a>
                        <a href="{{ route('guest.product', ['order' => 'desc']) }}"
                            class=" flex items-center gap-2 my-2 py-2 px-4 bg-slate-100 rounded-full hover:bg-slate-300">
                            <i class="fa-solid fa-arrow-down"></i>
                            <span>Dsc</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Search Input -->
            <div class="flex-grow">
                <div class="relative">
                    <form action="{{ route('guest.product') }}" class="flex gap-2">
                        <input type="text" name="search" value="{{ $search }}"
                            class="w-full border border-gray-300 rounded-full py-2 pl-10 pr-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Cari Produk" />
                        <input type="text" name="order" value="{{ $order }}" readonly class="hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-2.5 text-gray-400"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 4a8 8 0 100 16 8 8 0 000-16zm12 12l-4-4" />
                        </svg>
                        <button type="submit"
                            class="bg-blue-500 border text-white font-semibold border-gray-300 rounded-full px-4 py-2">cari</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-full mb-4">
            {{-- <p class="font-semibold text-3xl text-gray-800">{{ $sub_katagori->name }}</p>
            <p class="text-xl font-normal text-gray-007">{{ $sub_katagori->description }}</p> --}}

            <div class="grid grid-cols-2 md:grid-cols-4 justify-center items-center gap-5 pt-5">
                @foreach ($producks as $produck)
                    {{-- {{ $produck->name }} --}}
                    <x-card-product :produck="$produck" />
                @endforeach
            </div>
        </div>
        {{-- <div class=""> --}}
        {{ $producks->links('vendor.pagination.tailwind') }} <!-- Use the Tailwind pagination view -->
        {{-- </div> --}}
    </section>

    <x-slot name="scripts">


    </x-slot>
</x-guest-layout>
