<x-guest-layout>
    <x-slot name="title">
        Checkout
    </x-slot>

    <div class=" w-full">
        <div class="flex gap-3 items-center">
            <a href="{{ url()->previous() }}">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Check Out Pesanan</h2>
        </div>

        <form method="POST" action="{{ route('user.checkout.make', $transaksi->transaksi_code) }}"
            class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md" x-data="{
                isSubmitDisabled: @json(collect($transaksi->produk_transaksi)->contains(fn($item) => $item->doc_pendukung == null)),
            }" x-init="$watch('isSubmitDisabled', value => { console.log('Button status:', value) })">
            @csrf
            <!-- Alamat Pengiriman -->
            <div class="mb-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-semibold">Alamat Pengiriman</h2>

                    <a href="{{ route('user.alamat.index', ['origin' => request()->fullUrl()]) }}"
                        class="text-blue-500">{{ $alamat ? 'Edit Alamat' : 'Tambah Alamat' }}</a>

                </div>
                @if ($alamat)
                    <p class="text-gray-600">{{ $alamat->nama_penerima }}</p>
                    <p class="text-gray-600">{{ $alamat->no_hp }}</p>
                    <p class="text-gray-600">{{ $alamat->kelurahan }}, {{ $alamat->kecamatan }},
                        {{ $alamat->kabupaten }}, {{ $alamat->provinsi }}, {{ $alamat->kode_pos }}</p>

                    <input type="text" name="alamat_id" class="hidden" value="{{ $alamat->id }}" readonly>
                @else
                    <p>Tambahkan alamat terlebih dahulu</p>
                @endif

            </div>

            <!-- Daftar Pesanan -->
            <div class="mb-6 border-t pt-4">
                <h2 class="text-lg font-semibold">Pesanan</h2>


                @foreach ($transaksi->produk_transaksi as $produk_transaksi)
                    <!-- Pesanan card -->
                    <div class="flex justify-between items-center border-b pb-4">
                        <div>
                            <p class="font-semibold">{{ $produk_transaksi->produck->name }}</p>
                            <a href="{{ route('user.checkout.product_detail', ['id' => $produk_transaksi->id, 'origin' => request()->fullUrl()]) }}"
                                class="text-blue-500 text-sm">{{ $produk_transaksi->doc_pendukung ? 'Detail produkc' : 'Tambah Detail produck' }}</a>
                        </div>

                        <div class="flex items-center space-x-12">
                            <div class="text-center">
                                <p class="font-semibold">Harga Barang</p>
                                <p class="text-blue-500">Rp.
                                    {{ number_format($produk_transaksi->produck->data_produck->harga_satuan, 0, ',', '.') }}
                                </p>
                            </div>

                            <div class="px-3" x-data="productCounter(@json($produk_transaksi->id), @json($produk_transaksi->jumlah), @json($produk_transaksi->produck->data_produck->harga_satuan), '{{ route('user.checkout.update-quantity') }}')" x-init='calculateTotalPrice'>
                                <p class="font-bold text-base">Jumlah</p>
                                <div class="flex items-center">
                                    <button type="button"
                                        class="inline-flex h-5 w-5 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                                        @click="decrement">
                                        <i class="fa-solid fa-minus text-white"></i>
                                    </button>

                                    <!-- Input Counter -->
                                    <input type="text" x-model="quantity"
                                        class="w-10 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 "
                                        required />

                                    <!-- Tombol Plus -->
                                    <button type="button"
                                        class="inline-flex h-5 w-5 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                                        @click="increment">
                                        <i class="fa-solid fa-plus text-white"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="text-center">
                                <p class="font-semibold">Total Harga</p>
                                <p class="text-blue-500">Rp. <span id="totalPrice{{ $produk_transaksi->id }}"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Metode Pengiriman -->
            <div class="mb-6  pt-4">
                <h2 class="text-lg font-semibold mb-4">Metode Pengiriman</h2>
                <div>
                    <label class="inline-flex items-center">
                        <input type="radio" name="pengiriman" value="ambil_toko" class="form-radio" checked />
                        <span class="ml-2">Ambil di toko</span>
                    </label>
                    <p class="text-gray-500 ml-6">Pilih outlet Percetakan Prima Printing untuk pengambilan barang
                        pesanan</p>

                    <div class="ml-6 mt-2">
                        <select class="border px-4 py-2 w-full rounded-md">
                            <option>Prima Printing Cabang Madukoro (Proximal)</option>
                            <option>Prima Printing Cabang Pasar Cempaka</option>
                        </select>
                    </div>
                </div>

                @if (in_array($alamat->kecamatan, ['Kotabumi Utara', 'Sungkai Jaya']))
                    <div class="mt-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="pengiriman" value="kuri_toko" class="form-radio" />
                            <span class="ml-2">Kirim ke alamat (kurir toko)</span>
                        </label>

                    </div>
                @endif
                <div class="mt-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="pengiriman" value="jnt" class="form-radio" />
                        <span class="ml-2">J&t</span>
                    </label>

                </div>
            </div>


            <!-- Metode Pembayaran -->
            <div class="mb-6 border-t pt-4">
                <h2 class="text-lg font-semibold mb-4">Metode Pembayaran</h2>
                <div class="space-y-4" x-data='{paymentMetode: "transfer_bank" }'>
                    <div id="pay_toko">
                        <label class="inline-flex items-center">
                            <input type="radio" name="pembayaran" x-model="paymentMetode" value="bayar_toko"
                                class="form-radio" />
                            <span class="ml-2">Bayar Di toko</span>
                        </label>
                    </div>
                    <div>
                        <label class ="inline-flex items-center">
                            <input type="radio" name="pembayaran" x-model="paymentMetode" value="transfer_bank"
                                class="form-radio" />
                            <span class="ml-2">Transfer Bank</span>
                        </label>
                        <div x-show="paymentMetode === 'transfer_bank'" class="ml-6 mt-2">
                            <select name="via_id" class="border px-4 py-2 w-full rounded-md">
                                <option value="BCA">BCA</option>
                                <option value="BRI">BRI</option>
                                <option value="mandiri">Mandiri</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" name="pembayaran" x-model="paymentMetode" value="walet"
                                class="form-radio" />
                            <span class="ml-2">Ewallet</span>
                        </label>
                        <div x-show="paymentMetode === 'walet'" class="ml-6 mt-2">
                            <select name="via_id" class="border px-4 py-2 w-full rounded-md">
                                <option>Pilih Ewallet untuk pembayaran</option>
                                <option>Dana</option>
                                <option>Gopay</option>
                                <option>OVO</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" name="pembayaran" x-model="paymentMetode" value="qris"
                                class="form-radio" />
                            <span class="ml-2">QRIS</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Ringkasan Pesanan -->
            <div class="mb-6 border-t pt-4">
                <h2 class="text-lg font-semibold mb-4">Ringkasan Pesanan</h2>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span>Sub Total</span>
                        <span>Rp. <span id="subTotalPrice"></span></span>
                    </div>
                    <div class="flex justify-between">
                        <span>Biaya Pengiriman</span>
                        <input type="text" id="shiping_cost_input" name="shiping_cost" class="hidden">
                        <span>Rp <span id="pengiriman"></span></span>
                    </div>
                    <div class="flex justify-between">
                        <span>Biaya Layanan Pembeli</span>
                        <span>Rp <span id="admin"></span></span>
                    </div>
                    <div class="flex justify-between font-semibold">
                        <span>Total Pesanan</span>
                        <span>Rp <span id="totalFullPrice"></span></span>
                    </div>
                </div>
            </div>

            <!-- Button Buat Pesanan -->
            {{-- <x-utils.btn-submit  text="Buat pesanan" /> --}}
            <div class="text-center mt-8">
                <button type='submit' :disabled="isSubmitDisabled"
                    :class="isSubmitDisabled ? 'bg-blue-200 cursor-not-allowed' : 'bg-blue-600 hover:bg-blue-700'"
                    class="px-6 py-2  text-white rounded-md">Buat pesanan</button>
            </div>
        </form>


    </div>

    <x-slot name="scripts">
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script>
            var shipingCost = @json($shippingCosts);
            var price
            var pengirimanPrice = 0;
            var adminPrice = 1000;

            var subTotalPrice = document.getElementById('subTotalPrice');
            var totalPrice = document.getElementById('totalFullPrice');
            var pengiriman = document.getElementById('pengiriman');
            var admin = document.getElementById('admin').innerText = adminPrice.toLocaleString('id-ID');
            var pengirimanMetode = document.querySelectorAll('input[name="pengiriman"]');
            var shipingCostInput = document.getElementById('shiping_cost_input');

            pengiriman.innerText = pengirimanPrice.toLocaleString('id-ID');
            shipingCostInput.value = pengirimanPrice;
            var pembayaranMetodeValue = ''

            document.addEventListener('alpine:init', () => {
                Alpine.data('productCounter', (productId, initialQuantity = 0, productPrice, updateUrl) => ({
                    productId: productId,
                    productPrice: productPrice,
                    quantity: initialQuantity,
                    updateUrl: updateUrl,
                    totalPrice: initialQuantity * productPrice,

                    increment() {
                        this.quantity++;
                        this.updateProductQuantity();
                    },

                    decrement() {
                        if (this.quantity > 0) this.quantity--;
                        this.updateProductQuantity();
                    },

                    updateProductQuantity() {
                        axios.post(this.updateUrl, {
                                product_id: this.productId,
                                quantity: this.quantity
                            })
                            .then(response => {
                                console.log(`Product ${this.productId} updated successfully.`);
                                this.calculateTotalPrice();
                            })
                            .catch(error => {
                                console.error(`Failed to update product ${this.productId}: `, error);
                            });
                    },
                    calculateTotalPrice() {
                        this.totalPrice = this.quantity * this.productPrice;
                        document.getElementById(`totalPrice${this.productId}`).innerText = this.totalPrice
                            .toLocaleString('id-ID');

                        calculateTotalPriceTransaktion();
                    }
                }));
            });

            function calculateTotalPriceTransaktion() {
                var total = 0;
                document.querySelectorAll('[id^=totalPrice]').forEach((element) => {
                    total += parseInt(element.innerText.replace(/\./g, ''));
                });
                subTotalPrice.innerText = total.toLocaleString('id-ID');
                updateTotalPrice(pengirimanPrice);
            }

            function updateTotalPrice() {
                totalPrice.innerText = (parseInt(subTotalPrice.innerText.replace(/\./g, '')) + parseInt(pengiriman.innerText
                    .replace(/\./g, '')) + adminPrice).toLocaleString('id-ID');
            }
            pengirimanMetode.forEach((element) => {
                pembayaranMetodeValue = element.value;
                console.log(pembayaranMetodeValue);
                element.addEventListener('change', function() {
                    if (element.value === 'kuri_toko') {
                        pengirimanPrice = 10000;
                        pengiriman.innerText = pengirimanPrice.toLocaleString('id-ID');
                        shipingCostInput.value = pengirimanPrice;
                        document.getElementById('pay_toko').innerHTML = ""
                        calculateTotalPriceTransaktion();
                    } else if (element.value === 'jnt') {
                        pengirimanPrice = shipingCost;
                        pengiriman.innerText = pengirimanPrice.toLocaleString('id-ID');
                        shipingCostInput.value = pengirimanPrice;
                        document.getElementById('pay_toko').innerHTML = ""
                        calculateTotalPriceTransaktion();
                    } else {
                        pengirimanPrice = 0;
                        pengiriman.innerText = pengirimanPrice.toLocaleString('id-ID');
                        shipingCostInput.value = pengirimanPrice;
                        calculateTotalPriceTransaktion();
                    }
                    if (element.value === 'ambil_toko') {
                        document.getElementById('pay_toko').innerHTML = `<label class="inline-flex items-center">
                                <input type="radio" name="pembayaran" x-model="paymentMetode" value="bayar_toko"
                                    class="form-radio" />
                                <span class="ml-2">Bayar Di toko</span>
                            </label>`;
                    }
                });
            });
        </script>
    </x-slot>






</x-guest-layout>
