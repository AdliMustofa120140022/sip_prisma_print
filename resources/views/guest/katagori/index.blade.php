<x-guest-layout>
    <x-slot name="title"> Product</x-slot>

    <section class="md:flex md:gap-10 px-4 md:px-0">
        <x-product-sidebar :param='$params' />
        <div class="w-full mt-12">
            <p class="font-semibold text-3xl text-gray-800">{{ $sub_katagori->name }}</p>
            <p class="text-xl font-normal text-gray-007">{{ $sub_katagori->description }}</p>

            <div class="grid grid-cols-2 md:grid-cols-3 justify-center items-center gap-5 pt-5">
                @foreach ($producks as $produck)
                    {{-- {{ $produck->name }} --}}
                    <x-card-product :produck="$produck" />
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>
