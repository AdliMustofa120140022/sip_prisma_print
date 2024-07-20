<x-guest-layout>
    <x-slot name="title">Home</x-slot>

    <section class="promosi">
        <div class="container mx-auto py-10">
            <div x-data="carousel()" x-init="startAutoSlide()" class="relative">
                <!-- Carousel Items -->
                <div class="overflow-hidden relative">
                    <div id="carousel" x-ref="carousel"" class="flex transition-transform duration-500 ease-in-out ">
                        {{-- carousel item --}}
                        <div class="min-w-full min-h-full rounded-2xl border-3 border py-10 md:px-20">
                            <p class="uppercase font-bold">Promosi</p>
                            <div class="flex justify-center">
                                <div class="">
                                    <p class="text-7xl font-light pt-5 pb-10">Kostume Borsur 1</p>
                                    <a href=""
                                        class="px-4 py-3 hover:bg-blue-800 bg-blue-400 rounded-3xl font-semibold text-white">Kostum
                                        Disini</a>
                                </div>
                                <div class=" flex justify-around items-center w-full ">
                                    <img src="{{ asset('static/img/test-item.png') }}" alt="img promoso"
                                        class="hover:scale-105 aspect-square rounded-2xl h-[240px]">
                                    <img src="{{ asset('static/img/test-item.png') }}" alt="img promoso"
                                        class="hover:scale-105 aspect-square rounded-2xl h-[240px]">
                                    <img src="{{ asset('static/img/test-item.png') }}" alt="img promoso"
                                        class="hover:scale-105 aspect-square rounded-2xl h-[240px]">
                                </div>
                            </div>
                        </div>
                        {{-- carousel item --}}

                    </div>
                </div>

                <!-- Navigation Buttons -->
                <button @click="prev"
                    class="hover:bg-gray-200 absolute left-2 top-1/2 transform -translate-y-1/2 border-2 text-gray-700 px-3 py-1 rounded-full">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button @click="next"
                    class="hover:bg-gray-200 absolute right-2 top-1/2 transform -translate-y-1/2 border-2 text-gray-700 px-3 py-1 rounded-full">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <section class="product-view">
        <p class="text-xl font-bold uppercase text-center my-5">Tentukan Kebutuhan Cetak Anda</p>

        <div class="felx justify-center items-center text-center">
            @foreach ($katagoris as $katagori)
                <a href=" {{ route('guest.dashboard', ['p' => $katagori->nama]) }}"
                    class="hover:bg-blue-600 hover:text-white px-5 py-2 mx-4 rounded-3xl border border-1  text-balance font-bold inline-block {{ request('p') == $katagori->nama ? 'border-black text-black' : 'text-gray-500' }}">{{ $katagori->nama }}</a>
            @endforeach

            <div class="flex flex-wrap justify-center items-center gap-10 pt-5">
                @foreach ($producks as $produk)
                    <x-card-sub-katagori :subKatagori="$produk" />
                @endforeach
            </div>
        </div>

    </section>

    <x-slot name="scripts">
        <script>
            const CarouselLength = document.getElementById('carousel');

            function carousel() {
                return {
                    currentIndex: 0,
                    items: CarouselLength.children.length,
                    autoSlideInterval: null,
                    startAutoSlide() {
                        console.log('start');
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
                    }
                }
            }
        </script>
    </x-slot>
</x-guest-layout>
