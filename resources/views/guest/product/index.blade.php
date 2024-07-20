<x-guest-layout>
    <x-slot name="title"> Product</x-slot>

    <section class="flex gap-10">
        <x-product-sidebar :param='$params' />
        <div class="w-full">
            <p class="font-semibold text-3xl text-gray-800">{{ $sub_katagori->name }}</p>
            <p class="text-xl font-normal text-gray-007">{{ $sub_katagori->description }}</p>

            <div class="flex flex-wrap justify-start items-center gap-5 pt-5">
                @foreach ($producks as $produck)
                    {{-- {{ $produck->name }} --}}
                    <x-card-product :produck="$produck" />
                @endforeach
            </div>

        </div>


    </section>
</x-guest-layout>
