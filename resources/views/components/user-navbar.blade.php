 <nav class="bg-white sticky md:relative top-0 z-20" x-data='{ isMobileOpen: false }'>
     <div class="container mx-auto flex justify-between items-center py-3 px-4 ">
         <!-- Logo -->
         <div class="flex gap-5 items-center">
             <a class="flex gap-4" href="{{ route('guest.dashboard') }}">
                 <img src="{{ asset('static/img/prima_logo.png') }}" alt="logo"
                     class="drop-shadow-[0_2px_20px_rgba(0,0,0,0.5)] w-[50px] h-[50px]" />
                 <div class="flex flex-col text-blue-500">
                     <span class="font-bold text-lg">Percetakan </span>
                     <span class="font-bold text-lg">Prima Printing</span>
                 </div>
             </a>

             <!-- Desktop Menu -->
             <ul x-data='{
                    openMenu: null,
                }'
                 class="hidden md:flex gap-10 items-center font-semibold">
                 <li>
                     <a href="{{ route('guest.dashboard') }}"
                         class="hover:text-blue-500 flex items-center gap-4  {{ Request::routeIs('guest.dashboard') ? 'text-blue-500' : '' }} ">
                         <span class="">Beranda</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('guest.product') }}" class="hover:text-blue-500 flex items-center gap-4">
                         <span class="">Produk</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('guest.katagori') }}" class="hover:text-blue-500 flex items-center gap-4">
                         <span class="">Kategori</span>
                     </a>

                 </li>

                 <li>
                     <a href="{{ route('guest.about') }}" class="hover:text-blue-500 flex items-center gap-4">
                         <span class="">Tentang Kami</span>
                     </a>

                 </li>

             </ul>

         </div>

         <!-- Mobile Menu Toggle -->
         <button type="button" class="md:hidden text-2xl text-gray-700" @click="isMobileOpen = !isMobileOpen">
             <i class="fa-solid fa-bars"></i>
         </button>

         <!-- Desktop Actions -->
         <div class="hidden md:flex gap-5">
             <div class="flex gap-5 items-center">
                 <a href="{{ route('user.cart.index') }}" class="  py-2 px-6 rounded-full border relative inline-block">
                     {{-- <i class="fa-solid fa-cart-shopping"></i> --}}
                     <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                         <path
                             d="M16 16C16.5304 16 17.0391 16.2107 17.4142 16.5858C17.7893 16.9609 18 17.4696 18 18C18 18.5304 17.7893 19.0391 17.4142 19.4142C17.0391 19.7893 16.5304 20 16 20C15.4696 20 14.9609 19.7893 14.5858 19.4142C14.2107 19.0391 14 18.5304 14 18C14 16.89 14.89 16 16 16ZM0 0H3.27L4.21 2H19C19.2652 2 19.5196 2.10536 19.7071 2.29289C19.8946 2.48043 20 2.73478 20 3C20 3.17 19.95 3.34 19.88 3.5L16.3 9.97C15.96 10.58 15.3 11 14.55 11H7.1L6.2 12.63L6.17 12.75C6.17 12.8163 6.19634 12.8799 6.24322 12.9268C6.29011 12.9737 6.3537 13 6.42 13H18V15H6C5.46957 15 4.96086 14.7893 4.58579 14.4142C4.21071 14.0391 4 13.5304 4 13C4 12.65 4.09 12.32 4.24 12.04L5.6 9.59L2 2H0V0ZM6 16C6.53043 16 7.03914 16.2107 7.41421 16.5858C7.78929 16.9609 8 17.4696 8 18C8 18.5304 7.78929 19.0391 7.41421 19.4142C7.03914 19.7893 6.53043 20 6 20C5.46957 20 4.96086 19.7893 4.58579 19.4142C4.21071 19.0391 4 18.5304 4 18C4 16.89 4.89 16 6 16ZM15 9L17.78 4H5.14L7.5 9H15Z"
                             fill="#6A6A6A" />
                     </svg>

                     <span
                         class="absolute top-2 right-2 transform translate-x-1/2 -translate-y-1/2 bg-blue-500 text-gray-100 border-2 border-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center">
                         {{ $count_cart }}
                     </span>
                 </a>
                 <a href="{{ route('user.transaksi.index') }}"
                     class="  py-2 px-6 relative  rounded-full border inline-block">
                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                         <path
                             d="M17 4H7C5.89543 4 5 4.89543 5 6V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V6C19 4.89543 18.1046 4 17 4Z"
                             stroke="#6A6A6A" stroke-width="2" />
                         <path d="M9 9H15M9 13H15M9 17H13" stroke="#6A6A6A" stroke-width="2" stroke-linecap="round" />
                     </svg>


                 </a>
             </div>
             @if (Auth()->user())
                 <div x-data='{accountInfo: false}'>
                     <button type="button" @click="accountInfo = !accountInfo"
                         class="flex gap-3 justify-center items-center rounded-3xl bg-blue-500 py-2 px-6 text-white hover:bg-gray-100">
                         <span class="text-base font-medium">{{ Auth()->user()->name }}</span>
                         <i class="fa-solid fa-user text-base"></i>
                     </button>
                     <div x-show="accountInfo"
                         class="p-3 translate-y-4 -translate-x-32 w-64 text-sm text-gray-600 absolute bg-gray-200 rounded-xl border border-gray-300 shadow text-center transition-all duration-300 ease-in-out"
                         x-transition:enter="transition transform ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition transform ease-in duration-200"
                         x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                         <div
                             class="profile bg-white rounded-full text-center border-gray-400 aspect-square p-4 inline-block">
                             <i class="fa-solid fa-user text-lg aspect-square text-gray-500"></i>

                         </div>
                         <p class="text-base font-light">halo {{ Auth()->user()->name }}</p>

                         <div class="py-4">
                             <a href="{{ route('user.profile.index') }}"
                                 class="w-full block my-2 py-2 px-4 bg-slate-100 rounded-full hover:bg-slate-300">Kelola
                                 Akun</a>
                             <a href="{{ route('user.alamat.index', ['origin' => request()->fullUrl()]) }}"
                                 class="w-full block my-2 py-2 px-4 bg-slate-100 rounded-full hover:bg-slate-300">Alamat
                                 Pengiriman
                             </a>
                             <a href="{{ route('user.love.index') }}"
                                 class="w-full block my-2 py-2 px-4 bg-slate-100 rounded-full hover:bg-slate-300">Produk
                                 Favorit</a>
                             <a href="{{ route('logout') }}"
                                 class=" inline-block text-white font-semibold my-4 py-2 px-4 bg-red-400 rounded-full hover:bg-red-500">Logout
                             </a>
                         </div>
                     </div>
                 </div>
             @else
                 <ul class="flex gap-5 items-center font-semibold text-gray-600">
                     <li class="drop-shadow-[0_5px_20px_rgba(0,0,0,0.45)]">
                         <a href="{{ route('login') }}" class="rounded-lg">Masuk</a>
                     </li>
                     <li class="rounded-3xl bg-blue-500 py-2 px-6 text-white hover:bg-gray-100">
                         <a href="{{ route('register') }}" class="rounded-lg">Daftar</a>
                     </li>
                 </ul>
             @endif
         </div>
     </div>

     <!-- Mobile Menu -->
     <ul x-show="isMobileOpen" x-data='{openMenu: null}'
         class="md:hidden bg-white px-4 block shadow-[0_35px_60px_-15px_rgba(0,0,0,0.3)] transition-all duration-300 ease-in-out"
         x-transition:enter="transition transform ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition transform ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
         <li class="py-5">
             <a href="{{ route('guest.dashboard') }}" class="flex w-full justify-between items-center gap-4">
                 <span>Beranda</span>
             </a>
         </li>
         <li class="py-5">
             <a href="{{ route('guest.product') }}" class="flex w-full justify-between items-center gap-4">
                 <span>Produk</span>
             </a>
         </li>
         <li class="py-5">
             <a href="{{ route('guest.katagori') }}" class="flex w-full justify-between items-center gap-4">
                 <span>Katagori</span>
             </a>
         </li>
         <li class="py-5">
             <a href="{{ route('guest.about') }}" class="flex w-full justify-between items-center gap-4">
                 <span>Tentang Kami</span>
             </a>
         </li>

         @if (Auth()->user())
             <div x-data='{accountInfo: false} ' class="pb-4 ">
                 <div class="flex gap-3 justify-center items-center">
                     <button type="button" @click="accountInfo = !accountInfo"
                         class="flex gap-3  justify-center items-center rounded-3xl bg-blue-500 py-2 px-6 text-white hover:bg-gray-100">
                         <span class="text-base font-medium">{{ Auth()->user()->name }}</span>
                         <i class="fa-solid fa-user text-base"></i>
                     </button>
                     <a href="{{ route('logout') }}"
                         class=" text-white font-semibold my-4 py-2 px-4 bg-red-400 rounded-full hover:bg-red-500">Logout
                     </a>
                 </div>
                 <div x-show="accountInfo"
                     class="text-sm text-gray-600   text-center transition-all duration-300 ease-in-out"
                     x-transition:enter="transition transform ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition transform ease-in duration-200"
                     x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                     <div class="py-4">
                         <a href="{{ route('user.cart.index') }}"
                             class="w-full block my-2 py-2 px-4 bg-slate-100 rounded-full hover:bg-slate-300">Keranjang
                             saya
                         </a>
                         <a href="{{ route('user.profile.index') }}"
                             class="w-full block my-2 py-2 px-4 bg-slate-100 rounded-full hover:bg-slate-300">Kelola
                             Akun</a>
                         <a href="{{ route('user.alamat.index', ['origin' => request()->fullUrl()]) }}"
                             class="w-full block my-2 py-2 px-4 bg-slate-100 rounded-full hover:bg-slate-300">Alamat
                             Pengiriman
                         </a>
                         <a href="{{ route('user.transaksi.index') }}"
                             class="w-full block my-2 py-2 px-4 bg-slate-100 rounded-full hover:bg-slate-300">Riwayat
                             Transaksi
                         </a>
                         <a href="{{ route('user.love.index') }}"
                             class="w-full block my-2 py-2 px-4 bg-slate-100 rounded-full hover:bg-slate-300">Produk
                             Favorit</a>
                     </div>
                 </div>
             </div>
         @else
             <ul class="flex gap-5 items-center font-semibold text-gray-600 pb-4">
                 <li class="drop-shadow-[0_5px_20px_rgba(0,0,0,0.45)]">
                     <a href="{{ route('login') }}" class="rounded-lg">Masuk</a>
                 </li>
                 <li class="rounded-3xl bg-blue-500 py-2 px-6 text-white hover:bg-gray-100">
                     <a href="{{ route('register') }}" class="rounded-lg">Daftar</a>
                 </li>
             </ul>
         @endif
     </ul>
 </nav>
