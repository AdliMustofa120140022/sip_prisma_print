<nav class="navbar navbar-main  px-0 mx-4 shadow-none border-radius-xl bg-gradient-dark my-3" id="navbarBlur"
    navbar-scroll="true">

    <div class="container-fluid py-1 px-3 d-flex justify-content-between">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5  text-white">
                <li class="breadcrumb-item text-sm"><a class=" text-white" href="{{ route('admin.dashboard') }}">Pages</a>
                </li>
                <li class="breadcrumb-item text-sm  font-weight-bold  text-white" aria-current="page">
                    {{ str_replace(['-', '/'], [' ', ' / '], Request::path()) }}</li>
            </ol>
        </nav>

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner fs-1">
                            <i class="sidenav-toggler-line fs-1"></i>
                            <i class="sidenav-toggler-line fs-1"></i>
                            <i class="sidenav-toggler-line fs-1"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <p class="font-weight-bolder mb-0 text-white mx-3 ">{{ Auth::user()->name ?? '' }}</p>

</nav>
