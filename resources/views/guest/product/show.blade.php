<x-guest-layout>
    <x-slot name="title">Produk detail</x-slot>

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
                <a href=""
                    class="py-2 px-4 rounded-full font-medium bg-[#FFC20E] text-white hover:border-[#FFC20E] hover:border-2 hover:text-[#FFC20E] hover:bg-transparent">Pesan
                    Sekarang</a>
            </div>

            <!-- Add your content here -->

            <div class="border border-gray-300 rounded-lg p-5 my-3">
                <p class="text-lg font-semibold">Deskrisi Porduk</p>
                <p class="text-gray-500">{{ $produck->description }}</p>

                <p class=" mt-3 text-gray-500">Sepesifikasi</p>
                <p class="text-gray-500">{{ $produck->description }}</p>
            </div>

            <div class="border border-gray-300 rounded-lg p-5 my-3">
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
                <p class="text-gray-500">Ketebalan Kertas : {{ $produck->data_produck->ketebalan_kertas }} </p>
                <p class="text-gray-500">Tinta yang digunakan : {{ $produck->data_produck->tinta }} </p>


                <p class="text-lg font-semibold mt-5">Informasi Harga</p>
                <p class="text-gray-500">Harga Satuan : {{ $produck->data_produck->harga_satuan }} </p>
                <p class="text-gray-500">Harga Grosir : {{ $produck->data_produck->harga_grosir ?? ' - ' }} </p>
                <p class="text-gray-500">Minimum Pembelian Grosir :
                    {{ $produck->data_produck->minimal_grosir ?? ' - ' }} </p>


                <p class="text-lg font-semibold mt-5">Informasi Harga</p>
                <p class="text-gray-500">Tanggal Kadaluarsa : {{ $produck->data_produck->tanggal_kadaluarsa ?? ' - ' }}
                </p>
                <p class="text-gray-500">Supplier : {{ $produck->data_produck->supplier }} </p>


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
        </script>
    </x-slot>
</x-guest-layout>
