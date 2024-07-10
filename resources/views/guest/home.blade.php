<x-guest-layout>
    <x-slot name="title">Home</x-slot>

    <section class="product-view">
        <p class="text-xl font-bold uppercase text-center my-5">Tentukan Kebutuhan Cetak Anda</p>

        <div class="felx justify-center items-center text-center">
            <a href=" {{ route('guest.dashboard', ['p' => 'promosi']) }}"z
                class="px-5 py-2 mx-4 rounded-3xl border border-1  text-balance font-bold inline-block {{ request('p') == 'promosi' ? 'border-black text-black' : 'text-gray-500' }}">promosi</a>
            @foreach ($katagoris as $katagori)
                <a href=" {{ route('guest.dashboard', ['p' => $katagori->nama]) }}"z
                    class="px-5 py-2 mx-4 rounded-3xl border border-1  text-balance font-bold inline-block {{ request('p') == $katagori->nama ? 'border-black text-black' : 'text-gray-500' }}">{{ $katagori->nama }}</a>
            @endforeach

            <div class="flex flex-wrap justify-center items-center gap-10 pt-5">
                @foreach ($producks as $produk)
                    <x-card-product :produck="$produk" />
                @endforeach
            </div>
        </div>

    </section>
</x-guest-layout>
