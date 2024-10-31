<x-guest-layout>
    <x-slot name="title">Kategori</x-slot>

    @if (!$params)
        <div class="text-center">
            <p class="text-2xl font-semibold text-gray-800">Data Katagori Kosong</p>
            {{-- <p class="text-xl font-normal text-gray-500"></p> --}}
        </div>
    @else
        <section class="md:flex md:gap-10 px-4 md:px-0 relative">
            <x-product-sidebar :param='$params' />
            <div class="w-full mt-12 lg:mt-0">
                <p class="font-semibold text-xl md:text-3xl text-gray-800">{{ $sub_katagori->name }}</p>
                <p class="text-base md:text-xl font-normal text-gray-007">{{ $sub_katagori->description }}</p>

                <div class="flex justify-end">
                    <!-- Search Input -->
                    <div class="w-full lg:w-3/4">
                        <div class="relative">
                            <form action="{{ route('guest.katagori') }}" class="flex gap-2">
                                <input type="text" name="search" value="{{ $search }}"
                                    placeholder="Cari Produk"
                                    class="w-full border border-gray-300 rounded-full py-2 pl-10 pr-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Cari Produk" />
                                <i
                                    class="fa-solid fa-magnifying-glass h-5 w-5 absolute left-3 top-2.5 text-gray-400"></i>
                                <button type="submit"
                                    class="bg-blue-500 border text-white font-semibold border-gray-300 rounded-full px-4 py-2">cari</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 justify-center items-center gap-5 pt-5">
                    @foreach ($producks as $produck)
                        <x-card-product :produck="$produck" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-guest-layout>
