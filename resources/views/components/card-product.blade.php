<div class="group relative w-[370px] m-3">
    <div class="group-hover:shadow-2xl ease-in-out shadow-md bg-white rounded-xl mt-20 p-5 h-full pt-[125px]">
        <img class="group-hover:scale-105 ease-in-out absolute top-0 w-[330px] h-[188px] mx-auto   rounded-xl"
            src="{{ asset('static/dummy/dummy.png') }}" />

        <div class="text text-center">
            <p class="uppercase font-bold text-black pb-3">{{ $produck->name }}</p>
            <p class="pb-3">{{ $produck->description }}</p>
            <a href="#" class="inline group-hover:hidden text-blue-500 font-bold my-3">Selengkapnya >></a>
            <a href="#" class="hidden group-hover:inline text-blue-500 font-bold my-3">Lihat Semua
                {{ $produck->name }} >></a>
        </div>
    </div>

</div>
