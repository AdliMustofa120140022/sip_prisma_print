<section class="col-span-1">
    <aside
        x-bind:class="{ 'lg:translate-x-0': true, 'translate-x-0': isSidebarOpen, '-translate-x-full': !isSidebarOpen }"
        class="fixed inset-y-0 left-0 w-72 md:w-full px-4 bg-white z-50 lg:z-auto lg:relative transform lg:transform-none transition-transform duration-300 ease-in-out lg:transition-none">
        <div class="menu pb-4">

            <h3 class="font-bold text-3xl pb-2 ">Navigation</h3>
            <ul class="mb-5">

                <li
                    class=" py-2 ps-5 border-s-4 border-black hover:text-blue-500 hover:border-blue-500 text-blue-500 hover:bg-gray-200 rounded-e-md">
                    <a href="" class="flex gap-3 items-center">
                        <i class="fa-solid fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>

            </ul>


        </div>
    </aside>
</section>
