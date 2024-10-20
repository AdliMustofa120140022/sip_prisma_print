<section class="col-span-1 hidden lg:block">
    <aside class="px-4 bg-white ">
        <div class="menu pb-4">

            <h3 class="font-bold text-3xl pb-2 ">Navigasi</h3>
            <ul class="mb-5">

                <li
                    class=" py-2 ps-5 border-s-4 border-black hover:text-blue-500 hover:border-blue-500 text-blue-500 hover:bg-gray-200 rounded-e-md">
                    <a href="{{ route('guest.dashboard') }}" class="flex gap-3 items-center">
                        <i class="fa-solid fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li
                    class=" py-2 ps-5 border-s-4 border-black hover:text-blue-500 hover:border-blue-500 hover:bg-gray-200 rounded-e-md">
                    <a href="{{ route('guest.product') }}" class="flex gap-3 items-center">
                        <i class="fa-solid fa-box"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <li
                    class=" py-2 ps-5 border-s-4 border-black hover:text-blue-500 hover:border-blue-500 hover:bg-gray-200 rounded-e-md">
                    <a href="{{ route('guest.katagori') }}" class="flex gap-3 items-center">
                        <i class="fa-solid fa-list"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                <li
                    class=" py-2 ps-5 border-s-4 border-black hover:text-blue-500 hover:border-blue-500 hover:bg-gray-200 rounded-e-md">
                    <a href="{{ route('user.alamat.index') }}" class="flex gap-3 items-center">
                        <i class="fa-solid fa-pen-ruler"></i>
                        <span>Buat Pesanan Kustom</span>
                    </a>
                </li>
                <li
                    class=" py-2 ps-5 border-s-4 border-black hover:text-blue-500 hover:border-blue-500 hover:bg-gray-200 rounded-e-md">
                    <a href="{{ route('user.alamat.index') }}" class="flex gap-3 items-center">
                        <i class="fa-solid fa-location-arrow"></i>
                        <span>Kelola Alamat</span>
                    </a>
                </li>
                <li
                    class=" py-2 ps-5 border-s-4 border-black hover:text-blue-500 hover:border-blue-500 hover:bg-gray-200 rounded-e-md">
                    <a href="{{ route('user.love.index') }}" class="flex gap-3 items-center">
                        <i class="fa-solid fa-heart"></i>
                        <span>Produk Favorit</span>
                    </a>
                </li>
                <li
                    class=" py-2 ps-5 border-s-4 border-black hover:text-blue-500 hover:border-blue-500 hover:bg-gray-200 rounded-e-md">
                    <a href="{{ route('user.profile.index') }}" class="flex gap-3 items-center">
                        <i class="fa-solid fa-user"></i>
                        <span>Kelola Profile</span>
                    </a>
                </li>

            </ul>


        </div>
    </aside>
</section>
