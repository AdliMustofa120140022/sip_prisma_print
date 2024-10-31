<x-guest-layout>
    <x-slot name="title">Detail Produk</x-slot>

    <a href="" class="flex gap-4 items-center justify-start">
        <i class="fa-solid fa-chevron-left"></i>
        <span class="font-semibold text-lg">Detail Produk</span>
    </a>

    <section class="grid grid-cols-6 gap-10">
        <div class="col-span-2 ">
            <section class="relative w-full">
                <div x-data="carousel()" x-init="startAutoSlide()" class="relative overflow-hidden  m-3">
                    <div class="relative border rounded-2xl">
                        <div class="overflow-hidden relative">
                            <div id="carousel" x-ref="carousel"
                                class="flex transition-transform duration-500 ease-in-out">
                                {{-- carousel item --}}
                                <div class="rounded-2xl border-3 border min-w-full min-h-full">
                                    <img src="{{ asset('static/img/test-item.png') }}" alt="img promoso"
                                        class="aspect-[3/4] w-full rounded-2xl">
                                </div>
                                {{-- carousel item --}}
                                <div class="rounded-2xl border-3 border min-w-full min-h-full">
                                    <img src="{{ asset('static/img/test-item.png') }}" alt="img promoso"
                                        class="aspect-[3/4] w-full rounded-2xl">
                                </div>
                                {{-- carousel item --}}
                                <div class="rounded-2xl border-3 border min-w-full min-h-full">
                                    <img src="{{ asset('static/img/test-item.png') }}" alt="img promoso"
                                        class="aspect-[3/4] w-full rounded-2xl">
                                </div>
                                {{-- carousel item --}}
                                <div class="rounded-2xl border-3 border min-w-full min-h-full">
                                    <img src="{{ asset('static/img/test-item.png') }}" alt="img promoso"
                                        class="aspect-[3/4] w-full rounded-2xl">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <button @click="prev"
                        class="hover:bg-gray-200 absolute left-2 top-1/3 transform -translate-y-1/3 border-2 text-gray-200 px-3 py-1 rounded-full">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button @click="next"
                        class="hover:bg-gray-200 absolute right-2 top-1/3 transform -translate-y-1/3 border-2 text-gray-200 px-3 py-1 rounded-full">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>

                    <div class="flex mt-4 gap-4 justify-around items-center w-full">
                        <div @click="toImg(0)" class="rounded-2xl border-3 border">
                            <img src="{{ asset('static/img/test-item.png') }}" alt="img promoso"
                                class="aspect-square rounded-2xl h-32">
                        </div>
                        <div @click="toImg(1)" class="rounded-2xl border-3 border">
                            <img src="{{ asset('static/img/test-item.png') }}" alt="img promoso"
                                class="aspect-square rounded-2xl h-32">
                        </div>
                        <div @click="toImg(2)" class="rounded-2xl border-3 border">
                            <img src="{{ asset('static/img/test-item.png') }}" alt="img promoso"
                                class="aspect-square rounded-2xl h-32">
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-span-4">
            <div class="flex items-start justify-between">
                <div class="">
                    <p class="text-xl font-semibold py-3">{{ $produck->name }}</p>
                    <p class="text-blue-400">Harga Mulai Rp{{ $produck->data_produck->harga_satuan }}</p>
                </div>
                <div class="flex items-center gap-4">

                    <div x-data="{ open: false }">
                        <button type="button" @click= "open = true"
                            class="py-2 px-4 rounded-full font-medium bg-[#FFC20E] text-white hover:border-[#FFC20E] border-2 hover:text-[#FFC20E] hover:bg-transparent">Pesan
                            Sekarang</button>

                        <!-- Modal -->
                        <div x-show="open"
                            class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
                            <div @click.away='open = false' class="bg-white w-1/3 p-6 rounded-xl shadow-lg">
                                <h2 class="text-xl font-semibold mb-4">Pesan Produk</h2>
                                <form action="{{ route('user.cart.store') }}" method="POST" class="">
                                    @csrf
                                    <input type="hidden" name="product_id" id="product_id"
                                        value="{{ $produck->id }}">

                                    <label for="qty" class="text-gray-500 font-medium text-base">Jumlah</label>
                                    <input type="number" name="qty" id="qty" value="1"
                                        class="border border-gray-300 rounded-lg p-2 w-full">

                                    <div class="flex gap-5 py-4">
                                        <button type="submit"
                                            class="px-4 py-2 bg-[#FFC20E] hover:bg-yellow-500 text-base font-medium text-white rounded-full">Pesan
                                            Sekarang</button>
                                        <button @click="open = false"
                                            class="px-4 py-2 bg-red-400 hover:bg-red-500 text-base font-medium text-white rounded-full">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div x-data="modalHandler()" x-init="checkModalStatus()">
                        <button type="button" @click="openModal()"
                            class="py-2 px-4 rounded-full font-medium hover:bg-[#FFC20E] hover:text-white border-[#FFC20E] border-2 text-[#FFC20E] hover:bg-transparent">Masukan
                            Keranjang </button>

                        <!-- Modal -->
                        <div x-show="open"
                            class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
                            <div @click.away='closeModal()' class="bg-white w-1/3 p-6 rounded shadow-lg">
                                <h2 class="text-xl font-semibold mb-4">Modal Title</h2>
                                <form action="{{ route('user.cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" id="product_id"
                                        value="{{ $produck->id }}">

                                    <label for="qty" class="text-gray-500 font-medium text-base">Jumlah</label>
                                    <input type="number" name="qty" id="qty" value="1"
                                        class="border border-gray-300 rounded-lg p-2 w-full">

                                    <div class="flex gap-5 py-4">
                                        <button type="submit"
                                            class="px-4 py-2 bg-[#FFC20E] hover:bg-yellow-500 text-base font-medium text-white rounded-full">Pesan
                                            Sekarang</button>
                                        <button type="button" @click="closeModal()"
                                            class="px-4 py-2 bg-red-400 hover:bg-red-500 text-base font-medium text-white rounded-full">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add your content here -->
            <div class="border border-gray-300 rounded-lg p-5 my-3">
                <p class="text-lg font-semibold">Deskripsi Produk</p>
                <p class="text-gray-500">{{ $produck->description }}</p>
                <p class=" mt-3 text-gray-500">Spesifikasi</p>
                <p class="text-gray-500">{{ $produck->description }}</p>
            </div>

            <div class="border border-gray-300 rounded-lg p-5 my-3">
                <p class="text-lg font-semibold">Spesifikasi Produk</p>
                <p class="text-lg font-semibold mt-5">Data Produk</p>
                <p class="text-gray-500">Nama Produk : {{ $produck->name }}</p>
                <p class="text-gray-500">Katagori :{{ $produck->sub_katagori->katagori->nama }}</p>
                <p class="text-gray-500">Sub Katagori : {{ $produck->sub_katagori->name }}</p>
                {{--<p class="text-gray-500">Deskripsi : {{ $produck->description }}</p>--}}

                <p class="text-lg font-semibold mt-5">Stok Dan Dimensi</p>
                <p class="text-gray-500">Jumlah Stok : {{ $produck->data_produck->stok }} </p>
                <p class="text-gray-500">Ukuran Panjang : {{ $produck->data_produck->panjang }} mm</p>
                <p class="text-gray-500">Ukuran Lebar : {{ $produck->data_produck->lebar }} mm</p>
                <p class="text-gray-500">Ukuran Tinggi : {{ $produck->data_produck->tinggi }} mm</p>
                <p class="text-gray-500">Berat Satuan : {{ $produck->data_produck->berat }} gram</p>

                <p class="text-lg font-semibold mt-5">Spesifikasi Teknis</p>
                <p class="text-gray-500">Bahan : {{ $produck->data_produck->bahan }} </p>
                <p class="text-gray-500">Warna : {{ $produck->data_produck->warna }} </p>
                <p class="text-gray-500">Jenis Cetakan : {{ $produck->data_produck->jenis_cetak }} </p>
                <p class="text-gray-500">Resolusi Cetakan : {{ $produck->data_produck->resolusi }} </p>
                <p class="text-gray-500">Finishing : {{ $produck->data_produck->finishing }} </p>
                <p class="text-gray-500">Jenis Kertas : {{ $produck->data_produck->kertas }} </p>
                <p class="text-gray-500">Ketebalan Kertas : {{ $produck->data_produck->ketebalan_kertas }} gsm </p>
                <p class="text-gray-500">Tinta yang digunakan : {{ $produck->data_produck->tinta }} </p>
                <p class="text-gray-500">Estimasi Pengerjaan : {{ $produck->data_produck->estimasi ?? '1-14 Hari' }} </p>

                {{--<p class="text-lg font-semibold mt-5">Informasi Harga</p>
                <p class="text-gray-500">Harga Satuan : {{ $produck->data_produck->harga_satuan }} </p>
                <p class="text-gray-500">Harga Grosir : {{ $produck->data_produck->harga_grosir ?? ' - ' }} </p>
                <p class="text-gray-500">Minimum Pembelian Grosir :
                    {{ $produck->data_produck->minimal_grosir ?? ' - ' }} </p>

                <p class="text-lg font-semibold mt-5">Informasi Harga</p>
                <p class="text-gray-500">Tanggal Kadaluarsa :
                    {{ $produck->data_produck->tanggal_kadaluarsa ?? ' - ' }}
                </p>
                <p class="text-gray-500">Supplier : {{ $produck->data_produck->supplier }} </p>--}}

            </div>
        </div>
    </section>

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