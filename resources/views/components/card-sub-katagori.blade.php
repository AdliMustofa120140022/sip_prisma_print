<div class="group relative w-[400px] m-3">
    <div class="group-hover:shadow-2xl ease-in-out shadow-md bg-white rounded-xl mt-20 p-5 h-full pt-[125px]">
        <img class="group-hover:scale-105 ease-in-out absolute top-0 w-[360px] h-[188px] mx-auto   rounded-xl"
            src="{{ asset('static/dummy/dummy.png') }}" />

        <div class="text text-center">
            <p class="uppercase font-bold text-black pb-3">{{ $subKatagori->name }}</p>
            <p class="pb-3">{{ $subKatagori->description }}</p>
            <a href="{{ route('guest.product', ['p' => $subKatagori->id]) }}"
                class="inline group-hover:hidden text-blue-500 font-bold my-3">Selengkapnya >></a>
            <a href="{{ route('guest.product', ['p' => $subKatagori->id]) }}"
                class="hidden group-hover:inline text-blue-500 font-bold my-3">Lihat Semua
                {{ $subKatagori->name }} >></a>
        </div>
    </div>

</div>
