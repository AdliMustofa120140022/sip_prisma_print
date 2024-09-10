<nav class="bg-white sticky md:relative top-0 z-20" x-data='{ isMobileOpen: false }'>
    <div class="container mx-auto flex justify-between items-center py-3 px-4">
        <!-- Logo -->
        <div class="flex gap-5 items-center">
            <a href="{{ route('guest.dashboard') }}">
                <img src="{{ asset('static/img/prima_logo.png') }}" alt="logo"
                    class="drop-shadow-[0_2px_20px_rgba(0,0,0,0.5)] w-[50px] h-[50px]" />
            </a>

            <!-- Desktop Menu -->
            <ul x-data='{
                    isProductOpen: false,
                    isCategoryOpen: false,
                    isOrderOpen: false,
                    toggleMenu(menu) {
                        this[menu] = !this[menu];
                        this.closeOthers(menu);
                    },
                    closeOthers(openMenu) {
                        const menus = ["isProductOpen", "isCategoryOpen", "isOrderOpen"];
                        menus.forEach(menu => {
                            if (menu !== openMenu) this[menu] = false;
                        });
                    }
                }'
                class="hidden md:flex gap-10 items-center font-semibold">

                <!-- Product Dropdown -->
                <li>
                    <button @click="toggleMenu('isProductOpen')" class="hover:text-blue-500 flex items-center gap-4">
                        <span :class="isProductOpen ? 'text-blue-600' : ''">Produk</span>
                        <i class="fa-solid" :class="isProductOpen ? 'fa-angle-down' : 'fa-angle-up'"></i>
                    </button>
                    <ul x-show="isProductOpen"
                        class="p-2 translate-y-9 text-sm text-gray-600 grid grid-cols-4 gap-x-5 z-20 absolute bg-white rounded-lg border border-gray-400 shadow">
                        @foreach ($produck as $produk)
                            <li class="py-0">
                                <a href="{{ route('guest.product', ['p' => $produk->id]) }}"
                                    class="block rounded-lg hover:bg-gray-100">
                                    {{ $produk->name }}
                                </a>
                            </li>
                        @endforeach
                        <div class="col-span-4 text-center py-3">
                            <a class="font-bold text-blue-500" href="">Lihat Semua Produk ></a>
                        </div>
                    </ul>
                </li>

                <!-- Category Dropdown -->
                <li>
                    <button @click="toggleMenu('isCategoryOpen')" class="hover:text-blue-500 flex items-center gap-4">
                        <span :class="isCategoryOpen ? 'text-blue-600' : ''">Kategori</span>
                        <i class="fa-solid" :class="isCategoryOpen ? 'fa-angle-down' : 'fa-angle-up'"></i>
                    </button>
                    <ul x-show="isCategoryOpen"
                        class="p-3 translate-y-9 text-sm text-gray-600 flex gap-x-5 z-20 absolute bg-white rounded-lg border border-gray-400 shadow">
                        @foreach ($katagori as $katagoris)
                            <div class="card">
                                <span class="font-bold text-lg ">{{ $katagoris->nama }}</span>
                                @foreach ($katagoris->sub_katagori as $item)
                                    <li class="py-0">
                                        <a href="{{ route('guest.product', ['p' => $item->id]) }}"
                                            class="rounded-lg hover:bg-gray-100">
                                            {{ $item->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </div>
                        @endforeach
                    </ul>
                </li>


                <!-- Profile -->
                <li class="hover:text-blue-500">
                    <a href="" class="whitespace-nowrap">Tentang Kami</a>
                </li>
            </ul>
        </div>

        <!-- Mobile Menu Toggle -->
        <button type="button" class="md:hidden text-2xl text-gray-700" @click="isMobileOpen = !isMobileOpen">
            <i class="fa-solid fa-bars"></i>
        </button>

        <!-- Desktop Actions -->
        <div class="hidden md:flex gap-5">
            <div class="flex gap-5 items-center">

                <a href="{{ route('user.cart.index') }}" class="text-orange-600">
                    <i class="fa-solid fa-cart-shopping text-3xl"></i>
                </a>
            </div>
            @if (Auth()->user())
                <div x-data='{accountInfo: false}'>
                    <button type="button" @click="accountInfo = !accountInfo"
                        class="flex gap-3 justify-center items-center rounded-3xl bg-cyan-500 py-2 px-6 text-white hover:bg-gray-100">
                        <span class="text-base font-medium">{{ Auth()->user()->name }}</span>
                        <i class="fa-solid fa-user text-base"></i>
                    </button>
                    <div x-show="accountInfo"
                        class="p-3 translate-y-4 -translate-x-10 w-64 text-sm text-gray-600 absolute bg-gray-200 rounded-xl border border-gray-300 shadow text-center">
                        <div
                            class="profile bg-white rounded-full text-center border-gray-400 aspect-square p-4 inline-block">
                            <i class="fa-solid fa-user text-lg aspect-square text-gray-500"></i>

                        </div>
                        <p class="text-base font-light">halo {{ Auth()->user()->name }}</p>

                        <div class="py-4">
                            <a href=""
                                class="w-full block my-2 py-2 px-4 bg-slate-100 rounded-full hover:bg-slate-300">Kelola
                                Akun</a>
                            <a href=""
                                class="w-full block my-2 py-2 px-4 bg-slate-100 rounded-full hover:bg-slate-300">Alamat
                                Pengiriman
                            </a>
                            <a href=""
                                class="w-full block my-2 py-2 px-4 bg-slate-100 rounded-full hover:bg-slate-300">Riwayat
                                Pesanan</a>
                            <a href="{{ route('logout') }}"
                                class=" inline-block text-white font-semibold my-4 py-2 px-4 bg-red-400 rounded-full hover:bg-red-500">Logout
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <ul class="flex gap-5 items-center font-semibold text-gray-600">
                    <li class="drop-shadow-[0_5px_20px_rgba(0,0,0,0.45)]">
                        <a href="{{ route('login') }}" class="rounded-lg">Masuk</a>
                    </li>
                    <li class="rounded-3xl bg-cyan-500 py-2 px-6 text-white hover:bg-gray-100">
                        <a href="" class="rounded-lg">Daftar</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>

    <!-- Mobile Menu -->
    <ul x-show="isMobileOpen" x-data='{openMenu: null}'
        class="md:hidden bg-white px-4 block shadow-[0_35px_60px_-15px_rgba(0,0,0,0.3)]">
        <li class="py-5">
            <button @click="openMenu === 'product' ? openMenu = null : openMenu = 'product'"
                class="flex w-full justify-between items-center gap-4">
                <span>Produk</span>
                <i class="fa-solid" :class="openMenu === 'product' ? 'fa-angle-down' : 'fa-angle-up'"></i>
            </button>
            <ul x-show="openMenu === 'product'"
                class="grid grid-cols-3 mt-3 p-3 bg-white divide-y divide-gray-100 rounded-lg border border-gray-400 shadow">
                @foreach ($produck as $item)
                    <li>
                        <a href="{{ route('guest.product', ['p' => $item->id]) }}"
                            class="hover:bg-gray-100">{{ $item->name }}</a>
                    </li>
                @endforeach
            </ul>
        </li>

        <li class="py-5">
            <button @click="openMenu === 'katagori' ? openMenu = null : openMenu = 'katagori'"
                class="flex w-full justify-between items-center gap-4">
                <span>Kategori</span>
                <i class="fa-solid" :class="openMenu === 'katagori' ? 'fa-angle-down' : 'fa-angle-up'"></i>
            </button>
            <ul x-show="openMenu === 'katagori'"
                class="grid grid-cols-2 mt-3 p-3 bg-white divide-y divide-gray-100 rounded-lg border border-gray-400 shadow">
                @foreach ($katagori as $katagoris)
                    <div class="card">
                        <span class="font-bold text-lg">{{ $katagoris->nama }}</span>
                        @foreach ($katagoris->sub_katagori as $item)
                            <li>
                                <a href="{{ route('guest.product', ['p' => $item->id]) }}"
                                    class="hover:bg-gray-100">{{ $item->name }}</a>
                            </li>
                        @endforeach
                    </div>
                @endforeach
            </ul>
        </li>

        <li class="py-5">
            <a href="{{ route('login') }}" class="block">Tentang Kami</a>
        </li>
        @if (Auth()->user())
            <div x-data='{accountInfo: false} ' class="pb-4 ">
                <div class="flex gap-3 justify-center items-center">
                    <button type="button" @click="accountInfo = !accountInfo"
                        class="flex gap-3  justify-center items-center rounded-3xl bg-cyan-500 py-2 px-6 text-white hover:bg-gray-100">
                        <span class="text-base font-medium">{{ Auth()->user()->name }}</span>
                        <i class="fa-solid fa-user text-base"></i>
                    </button>
                    <a href="{{ route('logout') }}"
                        class=" text-white font-semibold my-4 py-2 px-4 bg-red-400 rounded-full hover:bg-red-500">Logout
                    </a>
                </div>
                <div x-show="accountInfo" class="text-sm text-gray-600   text-center">
                    <div class="py-4">
                        <a href=""
                            class="w-full block my-2 py-2 px-4 bg-slate-100 rounded-full hover:bg-slate-300">Keranjang
                            saya
                        </a>
                        <a href=""
                            class="w-full block my-2 py-2 px-4 bg-slate-100 rounded-full hover:bg-slate-300">Kelola
                            Akun</a>
                        <a href=""
                            class="w-full block my-2 py-2 px-4 bg-slate-100 rounded-full hover:bg-slate-300">Alamat
                            Pengiriman
                        </a>
                        <a href=""
                            class="w-full block my-2 py-2 px-4 bg-slate-100 rounded-full hover:bg-slate-300">Riwayat
                            Pesanan</a>
                    </div>
                </div>
            </div>
        @else
            <ul class="flex gap-5 items-center font-semibold text-gray-600 pb-4">
                <li class="drop-shadow-[0_5px_20px_rgba(0,0,0,0.45)]">
                    <a href="{{ route('login') }}" class="rounded-lg">Masuk</a>
                </li>
                <li class="rounded-3xl bg-cyan-500 py-2 px-6 text-white hover:bg-gray-100">
                    <a href="" class="rounded-lg">Daftar</a>
                </li>
            </ul>
        @endif
    </ul>
</nav>
