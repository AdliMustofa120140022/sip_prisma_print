<nav class=" bg-white sticky md:relative top-0 z-20" x-data='{ isMobileOpen : false}'>
    <div class=" container mx-auto flex  justify-between items-center py-3 px-4">
        <div class="flex gap-5 items-center">

            <a href='#'>
                <img src='{{ asset('static/img/prima_logo.png') }}' alt='logo'
                    class='drop-shadow-[0_2px_20px_rgba(0,0,0,0.5)]  w-[50px] h-[50px] ' />
            </a>


            <ul x-data='{isProduckOpen : false, iskatagoriOpen: false, isPesananOpen: false, showProduct () {
                this.isProduckOpen = !this.isProduckOpen
                this.iskatagoriOpen = false
                this.isPesananOpen = false
            }, showKatagori () {
                this.iskatagoriOpen = !this.iskatagoriOpen
                this.isProduckOpen = false
                this.isPesananOpen = false
            }, showPesanan () {
                this.isPesananOpen = !this.isPesananOpen
                this.isProduckOpen = false
                this.iskatagoriOpen = false
            }}'
                x-init='{isProduckOpen: false, iskatagoriOpen: false,
            }'
                class=' hidden md:flex gap-10 items-center  font-semibold'>
                <li>
                    <button @click=' showProduct() '
                        class='flex items-center gap-4 drop-shadow-[0_5px_20px_rgba(0,0,0,0.45)]'>
                        <span class='whitespace-nowrap'>Produk</span>
                        <i class="fa-solid  text-black" :class="isProduckOpen ? 'fa-angle-down' : 'fa-angle-up'"></i>
                    </button>

                    <ul x-show='isProduckOpen'
                        class="p-2 translate-y-9 text-sm text-gray-600 grid grid-cols-4 gap-x-5 z-20 top-10 absolute bg-white divide-y divide-gray-100 rounded-lg border border-gray-400 shadow ">
                        @foreach ($produck as $produk)
                            <li class="py-0 border-0">
                                <a href="#" class=" rounded-lg hover:bg-gray-100  ">
                                    <span>{{ $produk->name }}</span>
                                </a>
                            </li>
                        @endforeach
                        <div class="col-span-4 justify-center text-center py-3">
                            <a class="text-center font-bold text-blue-500" href="">Lihat Semua Produk ></a>
                        </div>

                    </ul>
                </li>
                <li x-data='{}'>
                    <button @click=' showKatagori() '
                        class='flex items-center gap-4 drop-shadow-[0_5px_20px_rgba(0,0,0,0.45)]'>
                        <span class='whitespace-nowrap'>Katagori</span>
                        <i class="fa-solid  text-black" :class="iskatagoriOpen ? 'fa-angle-down' : 'fa-angle-up'"></i>
                    </button>

                    <ul x-show='iskatagoriOpen'
                        class="p-2 translate-y-9 text-sm text-gray-600 flex gap-x-5 z-20 top-10 absolute bg-white divide-y divide-gray-100 rounded-lg border border-gray-400 shadow ">

                        @foreach ($katagori as $katagoris)
                            <div class="card">
                                <span class="font-bold text-lg">{{ $katagoris->nama }}</span>
                                @foreach ($katagoris->sub_katagori as $item)
                                    <li class="py-0">
                                        <a href="" class="rounded-lg hover:bg-gray-100  ">
                                            <span>{{ $item->name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </div>
                        @endforeach

                    </ul>
                </li>
                <li x-data='{}'>
                    <button @click=' showPesanan() '
                        class='flex items-center gap-4 drop-shadow-[0_5px_20px_rgba(0,0,0,0.45)]'>
                        <span class='whitespace-nowrap'>Pesanan</span>
                        <i class="fa-solid text-black" :class="isPesananOpen ? 'fa-angle-down' : 'fa-angle-up'"></i>
                    </button>

                    <ul x-show='isPesananOpen'
                        class="p-2 translate-y-9 text-sm text-gray-600 z-20 top-10 absolute bg-white divide-y divide-gray-100 rounded-lg border border-gray-400 shadow ">
                        <li class="py-0">
                            <a href="" class="rounded-lg hover:bg-gray-100  ">
                                <span>Pantai</span>
                            </a>
                        </li>
                        <li class="py-0">
                            <a href="" class="rounded-lg hover:bg-gray-100  ">
                                <span>Pantai</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="items-center gap-4 drop-shadow-[0_5px_20px_rgba(0,0,0,0.45)]">
                    <a href="" class="whitespace-nowrap">Profile</a>
                </li>
            </ul>
        </div>
        <button type="button" class='md:hidden text-2xl text-gray-700' @click=' isMobileOpen= !isMobileOpen '>
            <i class="fa-solid fa-bars"></i>
        </button>


        <div class="hidden md:flex gap-5">
            <div class="flex gap-5 items-center">
                <form action="">
                    <input type="text" id="search" name="search"
                        class="rounded-3xl focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-violet-700"
                        placeholder="cari produck">
                    {{-- <button type="submit">cari</button> --}}
                </form>

                <a href="" class="text-orange-600">
                    <i class="fa-solid fa-cart-shopping text-3xl"></i>
                </a>
            </div>
            <ul class=" flex gap-5 items-center  font-semibold text-gray-600">
                <li class=' drop-shadow-[0_5px_20px_rgba(0,0,0,0.45)]'>
                    <a href=" {{ route('login') }}" class="rounded-lg  ">
                        <span>Masuk</span>
                    </a>
                </li>
                <li class='
                    rounded-3xl bg-cyan-500 py-2 px-6 text-white hover:bg-gray-100'>
                    <a href="" class="rounded-lg  ">
                        <span>Daftar</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <ul x-show='isMobileOpen' x-data='{openMenu : null}'
        class="text-text-color font-semibold z-10 absolute md:hidden bg-white w-full px-4 block shadow-[0_35px_60px_-15px_rgba(0,0,0,0.3)]">

        <li class='py-5 '>
            <button @click='(openMenu === "product" ? openMenu = null : openMenu = "product") '
                class='flex w-full justify-between items-center gap-4 drop-shadow-[0_5px_20px_rgba(0,0,0,0.45)]'>
                <span class='whitespace-nowrap'>Produk</span>
                <i class="fa-solid text-black" :class="openMenu === 'product' ? 'fa-angle-down' : 'fa-angle-up'"></i>
                {{-- <FontAwesomeIcon icon={isTypeActive ? faAngleDown : faAngleUp} /> --}}
            </button>
            <ul x-show='openMenu === "product"' x-transition
                class="py- text-smtext-gray-200 top-10 w-full mt-3 bg-white divide-y divide-gray-100
                rounded-lg border border-gray-400 shadow grid grid-cols-3 justify-start ">
                @foreach ($produck as $item)
                    <li>
                        <a href="#" class=" hover:bg-gray-100  ">
                            <span>{{ $item->name }}</span>
                        </a>
                    </li>
                @endforeach

            </ul>

        </li>
        <li class='py-5 '>
            <button @click='(openMenu === "katagori" ? openMenu = null : openMenu = "katagori") '
                class='flex w-full justify-between items-center gap-4 drop-shadow-[0_5px_20px_rgba(0,0,0,0.45)]'>
                <span class='whitespace-nowrap'>Kategori</span>
                <i class="fa-solid text-black" :class="openMenu === 'katagori' ? 'fa-angle-down' : 'fa-angle-up'"></i>
                {{-- <FontAwesomeIcon icon={isTypeActive ? faAngleDown : faAngleUp} /> --}}
            </button>
            <ul x-show='openMenu === "katagori"' x-transition
                class="p-2 text-smtext-gray-200 top-10 w-full mt-3 bg-white divide-y divide-gray-100
                rounded-lg border border-gray-400 shadow grid grid-cols-2 justify-start ">
                @foreach ($katagori as $katagoris)
                    <div class="card">
                        <span class="font-bold text-lg">{{ $katagoris->nama }}</span>
                        @foreach ($katagoris->sub_katagori as $item)
                            <li class="py-0">
                                <a href="" class="rounded-lg hover:bg-gray-100  ">
                                    <span>{{ $item->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </div>
                @endforeach
            </ul>

        </li>
        <li class='py-5 '>
            <button @click='(openMenu === "pesanan" ? openMenu = null : openMenu = "pesanan") '
                class='flex w-full justify-between items-center gap-4 drop-shadow-[0_5px_20px_rgba(0,0,0,0.45)]'>
                <span class='whitespace-nowrap'>Pesanan</span>
                <i class="fa-solid text-black" :class="openMenu === 'pesanan' ? 'fa-angle-down' : 'fa-angle-up'"></i>
            </button>
            <ul x-show='openMenu === "pesanan"' x-transition
                class="p-2 text-smtext-gray-200 top-10 w-full mt-3 bg-white divide-y divide-gray-100
                rounded-lg border border-gray-400 shadow grid grid-cols-2 justify-start ">
                <div class="card">
                    <span class="font-bold text-lg">Kantor</span>
                    <li class="py-0">
                        <a href="" class="rounded-lg hover:bg-gray-100  ">
                            <span>Pantai</span>
                        </a>
                    </li>
                    <li class="py-0">
                        <a href="" class="rounded-lg hover:bg-gray-100  ">
                            <span>Pantai</span>
                        </a>
                    </li>
                </div>
                <div class="card">
                    <span class="font-bold text-lg">Kantor</span>
                    <li class="py-0">
                        <a href="" class="rounded-lg hover:bg-gray-100  ">
                            <span>Pantai</span>
                        </a>
                    </li>
                    <li class="py-0">
                        <a href="" class="rounded-lg hover:bg-gray-100  ">
                            <span>Pantai</span>
                        </a>
                    </li>
                </div>
            </ul>

        </li>
        <li class=''>
            <a class='py-5 block drop-shadow-[0_5px_20px_rgba(0,0,0,0.45)]  hover:bg-main-color'href={'/wisata'}>
                profil</a>
        </li>
    </ul>
    <div x-show='isMobileOpen' class="md:hidden absolute z-0 bg-opacity-30 bg-black w-full min-h-screen block"
        @click=' isMobileOpen = false'>
    </div>
</nav>
