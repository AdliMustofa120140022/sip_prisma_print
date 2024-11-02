<x-auth-layout>
    <x-slot name="title">Verifikasi Email</x-slot>

    <x-slot name="head">
    </x-slot>

    <section>
        <div class=" min-vh-100">
            {{-- <div class="container"> --}}
            <div class="row">
                <div class="col-md-6 border-3 d-none d-md-block" style="height: 100hv">
                    <img src="{{ asset('assets/img/main/auth-bg.png') }}" class="w-100 object-cover" style="height: 100vh"
                        alt="auth_image">
                </div>

                <div class="col-md-6 d-flex flex-column ">
                    <div class="card card-plain mt-8 w-80 mx-auto">
                        <div class="card-header pb-0 text-left bg-transparent">
                            <h3 class="font-weight-bolder text-dark text-gradient">Email Verifikasi</h3>
                        </div>
                        <div class="card-body">

                            <p class="mb-0">Terimaksih Sudah Mendaftar ke Aplikasi Kami. Silahkan Cek
                                Email Anda Untuk Verifikasi Akun, jika tidak ada email masuk silahkan
                                klik tombol dibawah ini untuk mengirim ulang email verifikasi</p>
                            </p>

                            <form role="form" method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <div class="text-center">
                                    <button type="submit" class="btn bg-dark w-100 mt-4 mb-0 text-white">Kirim
                                        Ulang Email Verifikasi</button>
                                </div>
                            </form>

                            <p class="mb-4 text-sm mt-4">
                                Kembali ke
                                <a href="{{ route('login') }}"
                                    class="text-dark text-gradient font-weight-bold">Login</a>
                            </p>
                            <p class="mb-4 text-sm">
                                <a href="{{ route('guest.dashboard') }}"
                                    class="text-dark text-gradient font-weight-bold">Kembali ke Halaman Utama</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </section>

    {{-- </section> --}}
    <x-slot name='scripts'>
        <script>
            function toggleShowPassword(target) {
                const targetInput = document.getElementById(target);
                const targetIcon = targetInput.parentElement.querySelector('#toggleIcon');
                if (targetInput.type === 'password') {
                    targetInput.type = 'text';
                    targetIcon.classList.remove('fa-eye-slash');
                    targetIcon.classList.add('fa-eye');
                } else {
                    targetInput.type = 'password';
                    targetIcon.classList.remove('fa-eye');
                    targetIcon.classList.add('fa-eye-slash');
                }
            }
        </script>
    </x-slot>
</x-auth-layout>