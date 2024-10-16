<x-guest-layout>
    <x-slot name="title">Home</x-slot>

    <x-slot name="head">
        <style>
            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }

            .no-scrollbar {
                -ms-overflow-style: none;
                /* IE dan Edge */
                scrollbar-width: none;
                /* Firefox */
            }
        </style>
    </x-slot>

    <section class="promosi">
        <div class="container mx-auto pb-10">
            <div x-data="carousel()" x-init="startAutoSlide()" class="relative">
                <!-- Carousel Items -->
                <div class="overflow-hidden relative">
                    <div id="carousel" x-ref="carousel"" class="flex transition-transform duration-500 ease-in-out ">
                        {{-- carousel item --}}
                        <div class="min-w-full rounded-2xl border-3 border aspect-[10/5] md:aspect-[10/3] w-full">
                            <img src="{{ asset('static/img/test-item.png') }}" alt="Slide 1"
                                class="w-full h-full rounded-2xl object-cover object-center">
                        </div>
                        <div class="min-w-full rounded-2xl border-3 border aspect-[10/5] md:aspect-[10/3] w-full">
                            <img src="{{ asset('static/img/test-item.png') }}" alt="Slide 1"
                                class="w-full h-full rounded-2xl object-cover object-center">
                        </div>
                        <div class="min-w-full rounded-2xl border-3 border aspect-[10/5] md:aspect-[10/3] w-full">
                            <img src="{{ asset('static/img/test-item.png') }}" alt="Slide 1"
                                class="w-full h-full rounded-2xl object-cover object-center">
                        </div>
                        <div class="min-w-full rounded-2xl border-3 border aspect-[10/5] md:aspect-[10/3] w-full">
                            <img src="{{ asset('static/img/test-item.png') }}" alt="Slide 1"
                                class="w-full h-full rounded-2xl object-cover object-center">
                        </div>
                        <div class="min-w-full rounded-2xl border-3 border aspect-[10/5] md:aspect-[10/3] w-full">
                            <img src="{{ asset('static/img/test-item.png') }}" alt="Slide 1"
                                class="w-full h-full rounded-2xl object-cover object-center">
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <button @click="prev"
                    class="hover:bg-gray-200 absolute left-2 top-1/2 transform -translate-y-1/2 border-2 text-gray-300 aspect-square w-10 rounded-full">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button @click="next"
                    class="hover:bg-gray-200 absolute right-2 top-1/2 transform -translate-y-1/2 border-2 text-gray-300 aspect-square w-10 rounded-full">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>

                <!-- Carousel Indicator -->
                <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex gap-2">
                    <template x-for="(item, index) in Array.from({ length: items })" :Key="index">
                        <button @click="goto(index)"
                            :class="{ 'bg-gray-500': index === currentIndex, 'bg-gray-200': index !== currentIndex }"
                            class="w-3 h-3 rounded-full"></button>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <section class="product-view px-3">
        <p class="text-xl font-bold uppercase text-center my-5">Tentukan Kebutuhan Cetak Anda</p>

        <div class="text-nowrap flex md:justify-center items-center overflow-scroll px-8 md:px-0 no-scrollbar">
            @foreach ($katagoris as $katagori)
                <a href=" {{ route('guest.dashboard', ['p' => $katagori->id]) }}"
                    class="hover:bg-blue-600 hover:text-white px-5 py-2 mx-2 md:mx-4 rounded-3xl border border-1 inline-block  text-balance font-bold  {{ $param == $katagori->id ? 'border-blue-500 text-blue-500' : 'text-gray-500' }}">{{ $katagori->nama }}</a>
            @endforeach
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 justify-center items-center gap-5 pt-5">
            @foreach ($producks as $produck)
                <x-card-product :produck="$produck" />
            @endforeach
        </div>

        <div class="text-center mt-6">

            <a href="{{ route('guest.product') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded-xl font-semibold shadow hover:bg-blue-600 focus:outline-nonet">
                Lihat Semua Produk
            </a>
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
                    goto(index) {
                        this.currentIndex = index;
                        this.$refs.carousel.style.transform = `translateX(-${this.currentIndex * 100}%)`;
                    }
                }
            }
        </script>
    </x-slot>
</x-guest-layout>
