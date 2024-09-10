<a href="{{ route('guest.product.show', $produck->id) }}" class="w-[315px] h-[412px] relative">
    <div class="w-[315px] h-[412px] left-0 top-0 absolute">
        <div class="w-[315px] h-[153px] left-0 top-[259px] absolute bg-white rounded-xl border border-[#d9d9d9]">
            <div class="w-[285px] left-[19px] top-[63px] absolute text-[#5f6368] text-sm font-normal  leading-none">
                {{ $produck->description }} </div>
            <div
                class="left-[19px] top-[32px] absolute text-[#1d1d1f] text-base font-semibold  leading-normal tracking-widest">
                {{ $produck->name }}</div>
            <div class="w-[177px] left-[19px] top-[121px] absolute text-[#0056b3] text-sm font-semibold  leading-none">
                Harga Rp 5.000,-</div>
        </div>
        <div class="w-[315px] h-[286px] left-0 top-0 absolute bg-white rounded-xl">
            <img class="w-[315px] h-[286px] left-0 top-0 rounded-xl absolute"
                src="{{ asset('static/dummy/dummy.png') }}" />
        </div>
    </div>
</a>
