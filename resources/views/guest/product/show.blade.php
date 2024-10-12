<x-guest-layout>
    <x-slot name="title">Produk detail</x-slot>

    <div class="mx-auto w-full px-1 2xl:px-0">
        <div class="flex gap-3 items-center">
            <a href="{{ url()->previous() }}">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Detail Prduk</h2>
        </div>


        <section class=" max-w-5xl mx-auto grid grid-cols-5 gap-10">
            <div class="col-span-2 ">
                <section class="relative w-full">
                    <div x-data="carousel()" x-init="startAutoSlide()" class="relative overflow-hidden  m-3">
                        <div class="relative border rounded-2xl shadow-sm">
                            <div class="overflow-hidden relative">
                                <div id="carousel" x-ref="carousel"
                                    class="flex transition-transform duration-500 ease-in-out">

                                    @if ($produck->img_produck->count() > 0)
                                        @foreach ($produck->img_produck as $img)
                                            <div
                                                class="rounded-2xl border-3 border min-w-full aspect-square border-gray-300 p-2 ">
                                                <img src="{{ asset('storage/img_produck/' . $img->img) }}"
                                                    alt="img promoso"
                                                    class="object-cover w-full h-full rounded-2xl shadow-lg">
                                            </div>
                                        @endforeach
                                    @else
                                        <div
                                            class="rounded-2xl border-3 border min-w-full aspect-square border-gray-300 p-2 ">
                                            <img src="{{ asset('static/dummy/dummy.png') }}" alt="img promoso"
                                                class="object-cover w-full h-full rounded-2xl shadow-lg">
                                        </div>
                                    @endif



                                </div>
                            </div>
                        </div>
                        <!-- Navigation Buttons -->
                        <button @click="prev"
                            class="hover:bg-gray-200 absolute left-2 top-1/4 transform translate-y-1/2 border-2 text-gray-200 px-3 py-1 rounded-full">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button @click="next"
                            class="hover:bg-gray-200 absolute right-2 top-1/4 transform translate-y-1/2 border-2 text-gray-200 px-3 py-1 rounded-full">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>

                        <p class="pt-4 pb-2 text-gray-800 font-semibold">Gambar Lainnya</p>
                        <div class="flex gap-3 justify-around items-center w-full overflow-hidden">

                            @if ($produck->img_produck->count() > 0)
                                @foreach ($produck->img_produck as $img)
                                    <div @click="toImg({{ $loop->index }})"
                                        class="rounded-2xl border min-w-20 aspect-square border-gray-300 p-1">
                                        <img src="{{ asset('storage/img_produck/' . $img->img) }}" alt="img promoso"
                                            class="rounded-2xl w-full h-full object-cover">
                                    </div>
                                @endforeach
                            @else
                                <div @click="toImg(0)"
                                    class="rounded-2xl border w-20 aspect-square border-gray-300 p-1">
                                    <img src="{{ asset('static/dummy/dummy.png') }}" alt="img promoso"
                                        class="rounded-2xl w-full h-full object-cover">
                                </div>

                            @endif

                        </div>
                    </div>
                </section>
            </div>

            <div class="col-span-3">
                <div class="p-6 mt-2" x-data="{ open: false }">
                    <div class="flex justify-between">
                        <h1 class="text-xl font-bold text-gray-900">{{ $produck->name }}</h1>
                        @if (Auth::check() && count($produck->produck_fav ?? []) > 0)
                            <a href="{{ route('user.love.remove', ['produkc_id' => $produck->id]) }}">
                                <i class=" fa-solid text-red-400 fa-heart text-3xl"></i>
                            </a>
                        @else
                            <a href="{{ route('user.love.add', ['produkc_id' => $produck->id]) }}">
                                <i class="fa-regular fa-heart text-3xl"></i>
                            </a>
                        @endif

                    </div>

                    <div class="flex items-center justify-between mt-2">
                        <p class="text-lg text-blue-500 font-semibold">Harga: Rp.
                            {{ number_format($produck->data_produck->harga_satuan, 0, ',', '.') }}</p>
                        <p class="text-gray-600">Stok : {{ $produck->data_produck->stok }}
                        </p>
                    </div>


                    <div x-data="{ orderOpen: null }" class="mt-4">
                        <div class="flex items-center gap-4 ">
                            <button type="button" @click= "orderOpen = 'buy'"
                                class="bg-blue-500 text-white px-4 py-2 rounded-xl font-semibold shadow hover:bg-blue-600 focus:outline-nonet">Pesan
                                Produk</button>
                            <button type="button" @click="orderOpen = 'cart'"
                                class="border border-blue-500 text-blue-500 px-4 py-2 rounded-xl font-semibold shadow hover:bg-blue-100 focus:outline-none">Tambah
                                ke Keranjang </button>
                        </div>
                        <div x-show="orderOpen !== null" class="transition-all duration-300 ease-in-out"
                            x-transition:enter="transition transform ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition transform ease-in duration-200"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95">
                            <form
                                :action="orderOpen === 'buy' ? '{{ route('user.cart.store') }}?type=buy' :
                                    '{{ route('user.cart.store') }}'"
                                method="POST" class="">
                                @csrf
                                <input type="hidden" name="product_id" id="product_id" value="{{ $produck->id }}">

                                <label for="qty" class="text-gray-500 font-medium text-base">Jumlah</label>
                                <input type="number" name="qty" id="qty" value="1"
                                    max="{{ $produck->data_produck->stok }}" min="1"
                                    class="border border-gray-300 rounded-lg p-2 w-full">

                                <div class="flex gap-5 py-4">
                                    <button type="submit"
                                        class=" bg-blue-500 text-white px-4 py-2 rounded-xl font-semibold shadow hover:bg-blue-600 focus:outline-none"
                                        x-text="orderOpen === 'buy' ? 'Pesan' : 'Simpan'">
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="" x-data="{ tab: 'deskripsi' }">
                    <div class="flex border-b">
                        <button @click="tab = 'deskripsi'"
                            :class="tab === 'deskripsi' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-500'"
                            class="px-4 py-2 focus:outline-none">Deskripsi Produk</button>
                        <button @click="tab = 'rincian'"
                            :class="tab === 'rincian' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-500'"
                            class="px-4 py-2 focus:outline-none">Rincian Produk</button>
                    </div>


                    <!-- Add your content here -->

                    <div x-show="tab === 'deskripsi'"
                        class="border border-gray-300 rounded-lg p-5 my-3 transition-all duration-300 ease-in-out"
                        x-transition:enter="transition transform ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition transform ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">


                        <p class="text-lg font-semibold">Deskrisi Porduk</p>
                        <p class="text-gray-500">{{ $produck->description }}</p>

                    </div>

                    <div x-show="tab === 'rincian'"
                        class="border border-gray-300 rounded-lg p-5 my-3 transition-all duration-300 ease-in-out"
                        x-transition:enter="transition transform ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition transform ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                        <p class="text-lg font-semibold">Sepesifikasi Produk</p>

                        <p class="text-lg font-semibold mt-5">Data Porduk</p>
                        <p class="text-gray-500">Nama Produk : {{ $produck->name }}</p>
                        <p class="text-gray-500">Katagori :{{ $produck->sub_katagori->katagori->nama }}</p>
                        <p class="text-gray-500">Sub Katagori : {{ $produck->sub_katagori->name }}</p>
                        <p class="text-gray-500">Deskrisi : {{ $produck->description }}</p>


                        <p class="text-lg font-semibold mt-5">Stok Dan Dimensi</p>
                        <p class="text-gray-500">Jumlah Stok : {{ $produck->data_produck->stok }} </p>
                        <p class="text-gray-500">Ukuruan Lebar : {{ $produck->data_produck->lebar }} cm</p>
                        <p class="text-gray-500">Ukuruan Panjang : {{ $produck->data_produck->panjang }} cm</p>
                        <p class="text-gray-500">Ukuruan Tinggi : {{ $produck->data_produck->tinggi }} cm</p>
                        <p class="text-gray-500">Berat Satuan : {{ $produck->data_produck->berat }} gram</p>


                        <p class="text-lg font-semibold mt-5">Sepesifikasi Teknis</p>
                        <p class="text-gray-500">Bahan : {{ $produck->data_produck->bahan }} </p>
                        <p class="text-gray-500">Warna : {{ $produck->data_produck->warna }} </p>
                        <p class="text-gray-500">Jenis Ctakan : {{ $produck->data_produck->jenis_cetak }} </p>
                        <p class="text-gray-500">Resolusi Cetakan : {{ $produck->data_produck->resolusi }} </p>
                        <p class="text-gray-500">Finising : {{ $produck->data_produck->finishing }} </p>
                        <p class="text-gray-500">Jenis Kertas : {{ $produck->data_produck->kertas }} </p>
                        <p class="text-gray-500">Ketebalan Kertas : {{ $produck->data_produck->ketebalan_kertas }}
                        </p>
                        <p class="text-gray-500">Tinta yang digunakan : {{ $produck->data_produck->tinta }} </p>


                        <p class="text-lg font-semibold mt-5">Informasi Harga</p>
                        <p class="text-gray-500">Harga Satuan : {{ $produck->data_produck->harga_satuan }} </p>
                        <p class="text-gray-500">Harga Grosir :
                            {{ $produck->data_produck->harga_grosir ?? ' - ' }} </p>
                        <p class="text-gray-500">Minimum Pembelian Grosir :
                            {{ $produck->data_produck->minimal_grosir ?? ' - ' }} </p>


                        <p class="text-lg font-semibold mt-5">Informasi Harga</p>
                        <p class="text-gray-500">Tanggal Kadaluarsa :
                            {{ $produck->data_produck->tanggal_kadaluarsa ?? ' - ' }}
                        </p>
                        <p class="text-gray-500">Supplier : {{ $produck->data_produck->supplier }} </p>


                    </div>
                </div>
            </div>
        </section>

        <section class=" max-w-5xl mx-auto my-10 ">
            <h3 class="font-semibold text-3xl text-center mb-4">Rekomendasi lainnya</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
                @foreach ($producks as $produck)
                    <x-card-product :produck="$produck" />
                @endforeach
            </div>
        </section>
    </div>

    <x-slot name="scripts">
        <script>
            function carousel() {
                return {
                    currentIndex: 0,
                    items: document.getElementById('carousel').children.length,
                    autoSlideInterval: null,
                    startAutoSlide() {
                        this.autoSlideInterval = setInterval(() => {
                            this.next();
                        }, 3000); // Change slides every 3 seconds
                    },
                    prev() {
                        this.currentIndex = (this.currentIndex === 0) ? this.items - 1 : this.currentIndex - 1;
                        this.$refs.carousel.style.transform = `translateX(-${this.currentIndex * 100}%)`;
                    },
                    next() {
                        this.currentIndex = (this.currentIndex === this.items - 1) ? 0 : this.currentIndex + 1;
                        this.$refs.carousel.style.transform = `translateX(-${this.currentIndex * 100}%)`;
                    },
                    toImg(id) {
                        console.log(id);
                        this.currentIndex = id;
                        this.$refs.carousel.style.transform = `translateX(-${this.currentIndex * 100}%)`;
                    }
                }
            }

            function presImage($src) {
                console.log($src);
            }


            function modalHandler() {
                return {
                    open: false,
                    openModal() {
                        this.open = true;
                        localStorage.setItem('modalOpen', true);
                    },
                    closeModal() {
                        this.open = false;
                        localStorage.setItem('modalOpen', false);
                    },
                    checkModalStatus() {
                        const success = "{{ session('success') }}";
                        if (success) {
                            this.closeModal();
                        }
                    }
                }
            }
        </script>
    </x-slot>
</x-guest-layout>
