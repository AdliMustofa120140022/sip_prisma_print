<x-guest-layout>
    <x-slot name="title">Cart</x-slot>

    <x-slot name="head">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </x-slot>

    <div class="mx-auto  w-full px-1 2xl:px-0">
        <div class="flex gap-3 items-center">
            <a href="{{ url()->previous() }}">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Shopping Cart</h2>
        </div>

        <div class="mt-2 sm:mt-4 md:gap-3 lg:flex lg:items-start xl:gap-3">
            <div class="mx-auto w-full flex-none lg:max-w-[70%] xl:max-w-[70%]">
                <div class="space-y-6">

                    {{ request()->query('cart_id') }}

                    @foreach ($carts as $cart)
                        <div x-data="{ counter: @json($cart->quantity), hargaBarang: @json($cart->product->data_produck->harga_satuan) }"
                            class="rounded-xl border border-gray-200 bg-white md:px-6 px-3 py-3 shadow-sm">
                            <div class="flex  items-start justify-between md:gap-6 gap-3 space-y-0">

                                {{-- <button x-data="{ selected: @json(request()->query('cart_id')) === @json($cart->id) ? true : false }" type="button" --}}
                                <button x-data="{
                                    selected: {{ request()->query('cart_id') == $cart->id ? 'true' : 'false' }}
                                }" type="button"
                                    class=" h-6 aspect-square border rounded-sm"
                                    @click="
                                selected = !selected;
                                selected ? addSelected(counter, hargaBarang, @json($cart->id)) : removeSelected(1);
                            ">
                                    <i x-show='selected' class="fa-solid fa-check text-blue-600"></i>
                                    <i x-show='!selected' class="fa-solid"></i>
                                </button>

                                <a href="#" class="shrink-0">
                                    <img class="md:w-32 w-24 rounded-xl aspect-square"
                                        src="{{ !empty($cart->product->img_produck) && is_array($cart->product->img_produck) ? asset('storage/img/produck/' . $cart->product->img_produck[0]->img) : asset('static/dummy/dummy.png') }}"
                                        alt="product image" />
                                </a>

                                <div class="w-full min-w-0 flex-1 space-y-4">
                                    <p class="text-2xl font-bold text-gray-900">{{ $cart->product->name }}</p>
                                    <p class="text-base font-medium text-blue-600">{{ $cart->product->description }}</p>

                                    <div class="flex items-center gap-4">
                                        <div class="hidden md:flex gap-3">
                                            <a href="{{ route('guest.product.show', $cart->product->id) }}"
                                                type="button"
                                                class="inline-flex gap-2 items-center text-sm font-medium text-black hover:underline pb-3 md:pb-0">
                                                <i class="fa-solid fa-eye"></i>
                                                See Product
                                            </a>

                                            <a href="{{ route('user.cart.delete', $cart->id) }}" type="button"
                                                class="inline-flex gap-2 items-center text-sm font-medium text-red-600 hover:underline">
                                                <i class="fa-solid fa-trash"></i>
                                                Remove
                                            </a>

                                        </div>
                                        <div class="px-3 hidden md:block">
                                            <p class="font-bold text-base">Harga Barang</p>
                                            <p class="text-blue-600 text-base font-medium">Rp
                                                Rp <span
                                                    x-text="hargaBarang.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})"></span>
                                            </p>
                                        </div>

                                        <div class="px-3">
                                            <p class="font-bold text-base">Jumlah</p>
                                            <div class="flex items-center">
                                                <button type="button" id="decrement-button"
                                                    class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                                                    @click="counter <= 0 ? counter = 0 : counter--">
                                                    <i class="fa-solid fa-minus text-white"></i>
                                                </button>
                                                <input type="text" id="counter-input" x-model="counter"
                                                    class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 "
                                                    required />
                                                <button type="button" id="increment-button" @click="counter++"
                                                    class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                                    <i class="fa-solid fa-plus text-white"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="hidden md:flex items-center justify-start md:order-3 md:justify-end">
                                    <div class="text-end md:order-4 md:w-32">
                                        <p class="font-medium text-base">Total Harga :</p>
                                        <p class="text-base font-bold text-blue-600">
                                            Rp <span
                                                x-text="(hargaBarang * counter).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})"></span>
                                        </p>
                                    </div>
                                </div>


                            </div>
                            <div class="flex md:hidden items-centermd:order-3 justify-between px-5 py-5">

                                <div class="flex gap-3 items-center">
                                    <a href="{{ route('guest.product.show', $cart->product->id) }}" type="button"
                                        class="inline-flex gap-2 items-center text-sm font-medium text-black hover:underline pb-3 md:pb-0">
                                        <i class="fa-solid fa-eye"></i>
                                        See Product
                                    </a>

                                    <a href="{{ route('user.cart.delete', $cart->id) }}" type="button"
                                        class="inline-flex gap-2 items-center text-sm font-medium text-red-600 hover:underline pb-3 md:pb-0">
                                        <i class="fa-solid fa-trash"></i>
                                        Remove
                                    </a>

                                </div>
                                <div class="text-end md:order-4 md:w-32">
                                    <p class="font-medium text-base">Total Harga :</p>
                                    <p class="text-base font-bold text-blue-600">
                                        Rp <span
                                            x-text="(hargaBarang * counter).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

            <div class="mx-auto mt-6 max-w-lg min-w-96 flex-1 space-y-6 lg:mt-0 lg:w-full">
                <div
                    class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700   sm:p-6">
                    <p class="text-xl font-semibold text-gray-900  ">Order summary</p>

                    <div class="space-y-4">
                        <div class="space-y-2">
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Sub Total
                                </dt>
                                <dd class="text-base font-medium text-gray-900  ">RP. <span id="total_Harga">0</span>
                                </dd>
                            </dl>
                        </div>
                    </div>


                    <div class="flex items-center justify-center gap-2">
                        <button type="button" onclick="checkOut()"
                            class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium bg-gray-600 text-white ">Check
                            Out
                        </button>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <form id="checkout-form" action="{{ route('user.checkout.store') }}" method="POST" class="hidden">
        @csrf
        <input type="hidden" id="item-details" name="items">
    </form>


    <x-slot name="scripts">
        <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
        <script>
            var itemSelected = [];
            const totalHargaElement = document.getElementById('total_Harga');

            function renderTotalHarga() {
                const totalHarga = itemSelected.reduce((acc, item) => acc + item.totalHarga, 0);
                totalHargaElement.innerText = totalHarga.toLocaleString('id-ID', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                });
            }

            function addSelected(total, harga, id) {
                if (itemSelected.includes(id)) {
                    itemSelected = itemSelected.filter(item =>
                        item.id !== id
                    );
                } else {
                    itemSelected.push({
                        id: id,
                        jumlah: total,
                        hargaBarag: harga,
                        totalHarga: total * harga
                    });
                }
                renderTotalHarga();
            }

            var carts = @json($carts);
            var paramCartid = @json(request()->query('cart_id'));

            if (paramCartid) {


                carts.forEach(cart => {
                    if (cart.id == paramCartid) {
                        addSelected(cart.quantity, cart.product.data_produck.harga_satuan, cart.id)
                    }
                });
            }

            function removeSelected(id) {
                itemSelected = itemSelected.filter(item =>
                    item.id !== id
                );

                renderTotalHarga();
            }

            // fungsi untu checout
            function checkOut() {
                // Pastikan itemSelected terdefinisi dan berisi data
                if (Array.isArray(itemSelected) && itemSelected.length > 0) {
                    const itemDetails = itemSelected.map(item => ({
                        id: item.id,
                    }));

                    // Cek apakah elemen dengan id 'item-details' ada
                    const itemDetailsInput = document.getElementById('item-details');
                    if (itemDetailsInput) {
                        // Masukkan data ke input form tersembunyi
                        itemDetailsInput.value = JSON.stringify(itemDetails);

                        // Cek apakah form dengan id 'checkout-form' ada sebelum submit
                        const checkoutForm = document.getElementById('checkout-form');
                        if (checkoutForm) {
                            // Submit form
                            checkoutForm.submit();
                        } else {
                            console.error('Checkout form not found!');
                        }
                    } else {
                        console.error('Item details input not found!');
                    }
                } else {
                    console.error('No items selected!');
                }
            }
        </script>

    </x-slot>


</x-guest-layout>
