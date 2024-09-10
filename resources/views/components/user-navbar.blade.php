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

                <!-- Order Dropdown -->
                <li>
                    <button @click="toggleMenu('isOrderOpen')" class="hover:text-blue-500 flex items-center gap-4">
                        <span :class="isOrderOpen ? 'text-blue-600' : ''">Pesanan</span>
                        <i class="fa-solid" :class="isOrderOpen ? 'fa-angle-down' : 'fa-angle-up'"></i>
                    </button>
                    <ul x-show="isOrderOpen"
                        class="p-2 translate-y-9 text-sm text-gray-600 absolute bg-white rounded-lg border border-gray-400 shadow">
                        <li class="py-0">
                            <a href="" class="rounded-lg hover:bg-gray-100">Pantai</a>
                        </li>
                        <li class="py-0">
                            <a href="" class="rounded-lg hover:bg-gray-100">Pantai</a>
                        </li>
                    </ul>
                </li>

                <!-- Profile -->
                <li class="hover:text-blue-500">
                    <a href="" class="whitespace-nowrap">Profil</a>
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
                <form action="">
                    <input type="text" id="search" name="search" placeholder="Cari produk"
                        class="rounded-3xl focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-violet-700">
                </form>
                <a href="{{ route('user.cart.index') }}" class="text-orange-600">
                    <i class="fa-solid fa-cart-shopping text-3xl"></i>
                </a>
            </div>
            <ul class="flex gap-5 items-center font-semibold text-gray-600">
                <li class="drop-shadow-[0_5px_20px_rgba(0,0,0,0.45)]">
                    <a href="{{ route('login') }}" class="rounded-lg">Masuk</a>
                </li>
                <li class="rounded-3xl bg-cyan-500 py-2 px-6 text-white hover:bg-gray-100">
                    <a href="" class="rounded-lg">Daftar</a>
                </li>
            </ul>
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
            <button @click="openMenu === 'pesanan' ? openMenu = null : openMenu = 'pesanan'"
                class="flex w-full justify-between items-center gap-4">
                <span>Pesanan</span>
                <i class="fa-solid" :class="openMenu === 'pesanan' ? 'fa-angle-down' : 'fa-angle-up'"></i>
            </button>
            <ul x-show="openMenu === 'pesanan'"
                class="grid grid-cols-2 mt-3 p-3 bg-white divide-y divide-gray-100 rounded-lg border border-gray-400 shadow">
                <li><a href="" class="hover:bg-gray-100">Pantai</a></li>
                <li><a href="" class="hover:bg-gray-100">Pantai</a></li>
            </ul>
        </li>

        <li class="py-5">
            <a href="{{ route('login') }}" class="block">Masuk</a>
        </li>
        <li class="py-5">
            <a href="" class="block">Daftar</a>
        </li>
    </ul>
</nav>
