<nav class="bg-white sticky md:relative top-0 z-20" x-data='{ isMobileOpen: false }'>
    <div class="container mx-auto flex justify-between items-center py-3 px-4 ">
        <!-- Logo -->
        <div class="flex gap-5 items-center">
            <a class="flex gap-4" href="{{ route('guest.dashboard') }}">
                <img src="{{ asset('static/img/prima_logo.png') }}" alt="logo"
                    class="drop-shadow-[0_2px_20px_rgba(0,0,0,0.5)] w-[50px] h-[50px]" />
                <div class="flex flex-col text-blue-500">
                    <span class="font-bold text-lg">Percetakan </span>
                    <span class="font-bold text-lg">Prima Printing</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <ul x-data='{
                    openMenu: null,
                }'
                class="hidden md:flex gap-10 items-center font-semibold">
                <li>
                    <a href=""
                        class="hover:text-blue-500 flex items-center gap-4  {{ Request::routeIs('guest.dashboard') ? 'text-blue-500' : '' }} ">
                        <span class="">Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="" class="hover:text-blue-500 flex items-center gap-4">
                        <span class="">Produk</span>
                    </a>
                </li>
                <li>
                    <a href="" class="hover:text-blue-500 flex items-center gap-4">
                        <span class="">Kategori</span>
                        <i class="fa-solid fa-angle-down"></i>
                    </a>

                </li>

                <li>
                    <a href="" class="hover:text-blue-500 flex items-center gap-4">
                        <span class="">Tentang Kami</span>
                    </a>

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

                <a href="{{ route('user.cart.index') }}" class="text-orange-600 relative inline-block">
                    <i class="fa-solid fa-bag-shopping text-3xl"></i>
                    <span
                        class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 bg-cyan-500 text-gray-100 border-2 border-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center">
                        4
                    </span>
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
                        class="p-3 translate-y-4 -translate-x-10 w-64 text-sm text-gray-600 absolute bg-gray-200 rounded-xl border border-gray-300 shadow text-center transition-all duration-300 ease-in-out"
                        x-transition:enter="transition transform ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition transform ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
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
        class="md:hidden bg-white px-4 block shadow-[0_35px_60px_-15px_rgba(0,0,0,0.3)] transition-all duration-300 ease-in-out"
        x-transition:enter="transition transform ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition transform ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
        <li class="py-5">
            <a href="" class="flex w-full justify-between items-center gap-4">
                <span>Home</span>
            </a>
        </li>
        <li class="py-5">
            <a href="" class="flex w-full justify-between items-center gap-4">
                <span>Produk</span>
            </a>
        </li>
        <li class="py-5">
            <a href="" class="flex w-full justify-between items-center gap-4">
                <span>katagori</span>
                <i class="fa-solid fa-angle-down"></i>
            </a>
        </li>
        <li class="py-5">
            <a href="" class="flex w-full justify-between items-center gap-4">
                <span>Tentang Kami</span>
            </a>
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
                <div x-show="accountInfo"
                    class="text-sm text-gray-600   text-center transition-all duration-300 ease-in-out"
                    x-transition:enter="transition transform ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition transform ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
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
