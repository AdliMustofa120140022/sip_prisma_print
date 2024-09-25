@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex items-center justify-center gap-3">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="disabled" aria-disabled="true">
                <span class="sr-only">Previous</span>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="rounded-md text-sky-600 px-4 py-2 border-sky-400 border font-semibold">Previous</a>
        @endif

        {{-- Pagination Elements --}}
        <div class="hidden md:flex gap-1">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="mx-2">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="bg-blue-500 text-white px-4 py-2 rounded-md mx-1">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                class="rounded-md text-sky-600 px-4 py-2 border-sky-400 border font-semibold">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="rounded-md text-sky-600 px-4 py-2 border-sky-400 border font-semibold">Next</a>
        @else
            <span class="disabled" aria-disabled="true">
                <span class="sr-only">Next</span>
            </span>
        @endif
    </nav>
@endif
