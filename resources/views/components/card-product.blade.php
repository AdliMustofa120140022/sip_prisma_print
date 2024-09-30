<a href="{{ route('guest.product.show', $produck->id) }}"
    class="max-w-xs h-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
    <!-- Image Section -->
    <div class="relative">
        <img class="w-full h-48 object-cover" src="{{ asset('static/dummy/dummy.png') }}" alt="Product Image">
        {{-- <button class="absolute top-2 right-2 bg-white rounded-full p-2 shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M3.172 5.172a4 4 0 015.656 0l.172.172.172-.172a4 4 0 115.656 5.656l-5.657 5.656a.5.5 0 01-.707 0L3.172 10.83a4 4 0 010-5.657z"
                    clip-rule="evenodd" />
            </svg>
        </button> --}}
    </div>
    <!-- Product Info -->
    <div class="p-4">
        <!-- Product Title -->
        <h2 class="font-semibold text-lg text-gray-900">{{ $produck->name }}</h2>

        <!-- Product Description -->
        <p class="text-gray-500 text-sm">{{ $produck->description }}</p>

        <!-- Product Price -->
        <p class="mt-2 font-semibold text-blue-500">Harga Rp.
            {{ number_format($produck->data_produck->harga_satuan, 0, ',', '.') }}-</p>

    </div>
</a>
