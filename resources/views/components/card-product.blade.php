<a href="{{ route('guest.product.show', $produck->id) }}"
    class="max-w-xs h-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
    <!-- Image Section -->
    <div class="relative">
        @if ($produck->img_produck->count() > 0)
            <img class="w-full h-32 md:h-36 lg:h-48 object-cover"
                src="{{ asset('storage/img_produck/' . $produck->img_produck[0]->img) }}" alt="Product Image">
        @else
            <img class="w-full h-32 md:h-36 lg:h-48 object-cover" src="{{ asset('static/img/default_product.png') }}"
                alt="Product Image">
        @endif

    </div>
    <!-- Product Info -->
    <div class="p-4">

        <h2 class="font-semibold text-lg text-gray-900">{{ $produck->name }}</h2>
        <p class="text-gray-500 text-xs md:text-sm line-clamp-2">{{ $produck->description }}</p>

        <p class="mt-2 font-semibold text-sm md:text-base text-blue-500">Harga Rp.
            {{ number_format($produck->data_produck->harga_satuan, 0, ',', '.') }}-</p>

    </div>
</a>
