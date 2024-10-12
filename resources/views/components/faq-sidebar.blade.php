<div class="" x-data='{isSidebarOpen : false}'>

    <div class="absolute lg:hidden w-full">
        <button @click="isSidebarOpen = !isSidebarOpen" class=" bg-blue-600 text-white px-4 py-2 rounded-md">
            <i class="fa-solid fa-bars"></i> Faq
        </button>
    </div>
    <div x-show="isSidebarOpen" @click="isSidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    </div>

    <aside
        x-bind:class="{ 'lg:translate-x-0': true, 'translate-x-0': isSidebarOpen, '-translate-x-full': !isSidebarOpen }"
        class="fixed inset-y-0 left-0 w-72 md:w-5/12 px-4 bg-white z-50 lg:z-auto lg:relative transform lg:transform-none transition-transform duration-300 ease-in-out lg:transition-none">
        <div class="menu pb-4">
            @foreach ($menus as $menu)
                <h3 class="font-bold text-3xl pb-2 ">{{ $menu['section'] }}</h3>
                <ul class="mb-5">
                    @foreach ($menu['questions'] as $item)
                        <li
                            class=" py-2 ps-5 border-s-4 border-black hover:text-blue-500 hover:border-blue-500 {{ $param == $item['param'] ? 'text-blue-500 border-blue-500' : '' }}">
                            <a href="{{ route('guest.faq', ['q' => $item['param']]) }}"
                                class="">{{ $item['question'] }}</a>
                        </li>
                    @endforeach
                </ul>
            @endforeach

        </div>
    </aside>
</div>
