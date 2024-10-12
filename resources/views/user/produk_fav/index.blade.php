<x-guest-layout>
    <x-slot name="title">Product Fav</x-slot>

    <section class="container mx-auto px-3">

        <div class="flex gap-3 items-center">
            <a href="{{ url()->previous() }}">
                <i class="fa-solid fa-arrow-left text-lg px-3"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Produk Favorit</h2>
        </div>
        <div class="flex items-center space-x-4 p-4 flex-wrap justify-between gap-5">

            <div class="w-full mb-4">
                @if (count($produck_favs) == 0)
                    <div class=" text-center">
                        <p class="text-2xl font-semibold text-gray-800">Produk Favorit Kosong</p>
                        <p class="text-xl font-normal text-gray-500">Silahkan tambahkan produk ke favorit</p>
                    </div>
                @endif
                <div class="grid grid-cols-2 md:grid-cols-4 justify-center items-center gap-5 pt-5">

                    @foreach ($produck_favs as $produck_fav)
                        <x-card-product :produck="$produck_fav->produck" />
                    @endforeach
                </div>
            </div>

    </section>

    <x-slot name="scripts">


    </x-slot>
</x-guest-layout>
