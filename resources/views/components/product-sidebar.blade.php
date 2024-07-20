<aside class="w-60">
    <p class="py-2 mb-3 px-3 rounded-md bg-[#043058] font-semibold text-gray-300">Katagori Produk</p>
    <ul x-data="{ openMenu: @json(optional(
            $katagoris->first(function ($katagori) use ($param) {
                return $katagori->sub_katagori->contains('id', $param);
            }))->id) }">
        @foreach ($katagoris as $katagori)
            <li>
                <button @click="openMenu !== {{ $katagori->id }} ? openMenu = {{ $katagori->id }} : openMenu = null"
                    class="hover:bg-blue-800 w-full flex bg-[#043058] rounded-md font-semibold text-gray-300 py-2 my-1 px-3">
                    <p>{{ $katagori->nama }}</p>
                    <i class="fa-solid fa-chevron-down ml-auto"
                        :class="openMenu === {{ $katagori->id }} ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                </button>
                <ul x-show='openMenu === {{ $katagori->id }}'>
                    @foreach ($katagori->sub_katagori as $sub_katagori)
                        <li>
                            <a href="{{ route('guest.product', ['p' => $sub_katagori->id]) }}"
                                class="block text-gray-500 hover:text-gray-700 hover:bg-gray-300 rounded-md py-2 px-5  {{ $param == $sub_katagori->id ? 'bg-gray-300' : '' }}">{{ $sub_katagori->name }}</a>
                        </li>
                    @endforeach
                </ul>

                <div class="w-full border-t-2 mb-3"></div>
            </li>
        @endforeach
    </ul>
</aside>
