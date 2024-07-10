<div class="relative w-[400px] m-3">
    <div class="bg-white rounded-xl shadow mt-20 p-5 h-full pt-[125px]">
        <img class=" absolute top-0 w-[360px] h-[188px] mx-auto  rounded-xl"
            src="{{ asset('static/dummy/dummy.png') }}" />

        <div class="text text-center">
            <p class="uppercase font-bold text-black pb-3">{{$produck->name}}</p>
            <p class="pb-3">{{{$produck->description}}}</p>
            <a href="#" class="inline text-blue-500 font-bold my-3">Cetak Kartu Nama Sekarang >></a>
        </div>
    </div>

</div>
