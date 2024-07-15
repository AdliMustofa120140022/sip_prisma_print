<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    style="background: #ccccd7" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <div class="navbar-brand m-0 d-flex align-items-center ">
            @if (Auth::user())
                <div class="col-auto">
                    <div class="avatar avatar-lg position-relative">
                        <img src="{{ Auth::user()->profile_ficture ? asset('storage/profile/' . Auth::user()->profile_ficture) : asset('static/img/default.png') }}"
                            alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class=" ms-1">
                    <span class="ms-1 font-weight-bold d-block">{{ Auth::user()->name }}</span>
                    <span class="ms-1 font-weight-bold d-block">{{ Auth::user()->role }}</span>
                </div>
            @endif
        </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto " style="height: min-content!important" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link rounded-3  {{ Request::routeIs('admin.dashboard') ? 'bg-gradient-dark    text-white ' : '' }} "
                    href={{ route('admin.dashboard') }}>
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md  text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('admin.dashboard') ? 'bg-white' : 'bg-gradient-dark' }}" ">
                <i class="fa-solid fa-house fs-5 text-gradient  {{ Request::routeIs('admin.dashboard') ? 'text-primary' : 'text-white ' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1 {{ Request::routeIs('admin.dashboard') ? 'text-white ' : ' text-black' }}">Dashboard</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Produk</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3  {{ Request::routeIs('admin.sub-kategori*') ? 'bg-gradient-dark    text-white ' : '' }} "
                    href={{ route('admin.sub-kategori.index') }}>
                    <div class="icon icon-shape icon-sm shadow border-radius-md  text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('admin.sub-kategori*') ? 'bg-white' : 'bg-gradient-dark' }}" ">
                        <i
                            class="fa-solid fa-house fs-5 text-gradient  {{ Request::routeIs('admin.sub-kategori*') ? 'text-primary' : 'text-white ' }}"></i>
                    </div>
                    <span
                        class="nav-link-text ms-1 {{ Request::routeIs('admin.sub-kategori*') ? 'text-white ' : ' text-black' }}">Katagori
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-3  {{ Request::routeIs('admin.product*') ? 'bg-gradient-dark    text-white ' : '' }} "
                    href={{ route('admin.product.index') }}>
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md  text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('admin.product*') ? 'bg-white' : 'bg-gradient-dark' }}" ">
                        <i
                            class="fa-solid fa-house fs-5 text-gradient  {{ Request::routeIs('admin.product*') ? 'text-primary' : 'text-white ' }}"></i>
                    </div>
                    <span
                        class="nav-link-text ms-1 {{ Request::routeIs('admin.product*') ? 'text-white ' : ' text-black' }}">Kelola
                        Produk</span>
                </a>
            </li>


            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Transaksi</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3  {{ Request::routeIs('dashboard') ? 'bg-gradient-dark    text-white ' : '' }} "
                    href={{ route('admin.dashboard') }}>
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md  text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('dashboard') ? 'bg-white' : 'bg-gradient-dark' }}" ">
                        <i
                            class="fa-solid fa-house fs-5 text-gradient  {{ Request::routeIs('dashboard') ? 'text-primary' : 'text-white ' }}"></i>
                    </div>
                    <span
                        class="nav-link-text ms-1 {{ Request::routeIs('dashboard') ? 'text-white ' : ' text-black' }}">Kelola
                        Pesanan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3  {{ Request::routeIs('dashboard') ? 'bg-gradient-dark    text-white ' : '' }} "
                    href={{ route('admin.dashboard') }}>
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md  text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('dashboard') ? 'bg-white' : 'bg-gradient-dark' }}" ">
                        <i
                            class="fa-solid fa-house fs-5 text-gradient  {{ Request::routeIs('dashboard') ? 'text-primary' : 'text-white ' }}"></i>
                    </div>
                    <span
                        class="nav-link-text ms-1 {{ Request::routeIs('dashboard') ? 'text-white ' : ' text-black' }}">Kelola
                        Pembayaran</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3  {{ Request::routeIs('dashboard') ? 'bg-gradient-dark    text-white ' : '' }} "
                    href={{ route('admin.dashboard') }}>
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md  text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('dashboard') ? 'bg-white' : 'bg-gradient-dark' }}" ">
                        <i
                            class="fa-solid fa-house fs-5 text-gradient  {{ Request::routeIs('dashboard') ? 'text-primary' : 'text-white ' }}"></i>
                    </div>
                    <span
                        class="nav-link-text ms-1 {{ Request::routeIs('dashboard') ? 'text-white ' : ' text-black' }}">Kelola
                        pengiriman</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3  {{ Request::routeIs('dashboard') ? 'bg-gradient-dark    text-white ' : '' }} "
                    href={{ route('admin.dashboard') }}>
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md  text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('dashboard') ? 'bg-white' : 'bg-gradient-dark' }}" ">
                        <i
                            class="fa-solid fa-house fs-5 text-gradient  {{ Request::routeIs('dashboard') ? 'text-primary' : 'text-white ' }}"></i>
                    </div>
                    <span
                        class="nav-link-text ms-1 {{ Request::routeIs('dashboard') ? 'text-white ' : ' text-black' }}">Kelola
                        Admin</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link rounded-3  {{ Request::routeIs('dashboard') ? 'bg-gradient-dark    text-white ' : '' }} "
                    href={{ route('admin.dashboard') }}>
                    <div class="icon icon-shape icon-sm shadow border-radius-md  text-center me-2 p-3 d-flex align-items-center justify-content-center {{ Request::routeIs('dashboard') ? 'bg-white' : 'bg-gradient-dark' }}" ">
                        <i
                            class="fa-solid fa-house fs-5 text-gradient  {{ Request::routeIs('dashboard') ? 'text-primary' : 'text-white ' }}"></i>
                    </div>
                    <span
                        class="nav-link-text ms-1 {{ Request::routeIs('dashboard') ? 'text-white ' : ' text-black' }}">Kelola
                        Lamporan</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>


            <li class="nav-item">

                <a type="submit" class="nav-link rounded-3 " href={{ route('logout') }}>
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 p-3 d-flex align-items-center justify-content-center bg-white ">
                        <i class="fa-solid fa-right-from-bracket fs-5 text-danger"></i>
                    </div>
                    <span class="nav-link-text ms-1 text-dark">Logout</span>
                </a>
            </li>
        </ul>
    </div>

</aside>
