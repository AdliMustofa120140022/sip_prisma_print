<aside class="w-60">
    <h2 class="py-2 mb-3 px-3 rounded-md font-semibold text-xl">Katagori Produk</h2>
    <ul x-data="{ openMenu: @json($katagoris->pluck('id')->toArray()) }">
        @foreach ($katagoris as $katagori)
            <li>
                <button class="hover:bg-gray-100 w-full flex rounded-md font-semibold text-black py-2 my-1 px-3"
                    @click="openMenu.includes({{ $katagori->id }}) ? openMenu = openMenu.filter(id => id !== {{ $katagori->id }}) : openMenu.push({{ $katagori->id }})">
                    <p>{{ $katagori->nama }}</p>
                    <i class="fa-solid fa-chevron-down ml-auto"
                        :class="openMenu.includes({{ $katagori->id }}) ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                </button>
                <ul x-show='openMenu.includes({{ $katagori->id }})'>
                    @foreach ($katagori->sub_katagori as $sub_katagori)
                        <li>
                            <a href="{{ route('guest.katagori', ['p' => $sub_katagori->id]) }}"
                                class="block hover:text-gray-900 hover:bg-gray-50 rounded-md py-2 px-5  {{ $param == $sub_katagori->id ? 'bg-gray-50' : '' }}">{{ $sub_katagori->name }}</a>
                        </li>
                    @endforeach
                </ul>

                <div class="w-full border-t-2 mb-3"></div>
            </li>
        @endforeach
    </ul>
</aside>
