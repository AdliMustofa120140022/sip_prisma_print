<x-auth-layout>
    <x-slot name="title">login</x-slot>

    <x-slot name="head">
        <style>
            div::-webkit-scrollbar {
                display: none;
            }
        </style>
    </x-slot>

    <section>
        <div class=" min-vh-100" style="max-height: 100vh; overflow-y: auto;">
            {{-- <div class="container"> --}}
            <div class="row">
                <div class="col-md-6 border-3 d-none d-md-block" style="height: 100hv">
                    <img src="{{ asset('assets/img/main/auth-bg.png') }}" class="w-100 object-cover" style="height: 100vh"
                        alt="auth_image">
                </div>

                <div class="col-md-6 d-flex flex-column"
                    style="max-height: 100vh; overflow-y: scroll; scrollbar-width: none; -ms-overflow-style: none;">
                    <div class="card card-plain mt-8 w-80 mx-auto">
                        <div class="card-header pb-0 text-left bg-transparent">
                            <h3 class="font-weight-bolder text-dark text-gradient">Masuk</h3>
                            <p class="mb-0"> Selamat dating Kembali, Silahkan masuk untuk melanjutkan belanja</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="POST" role="form">
                                @csrf
                                <label>Email</label>
                                <div class="mb-3">
                                    <input name="email" id="email" type="text" class="form-control"
                                        placeholder="Email" aria-label="Email" aria-describedby="email-addon"
                                        value="{{ old('email') }}" required>
                                </div>
                                <label>Password</label>
                                <div class="mb-3">
                                    <div class="form-control d-flex justify-content-between align-items-center p-0">
                                        <input type="password" name="password" id="password"
                                            class="form-control border-0" placeholder="Password" aria-label="Password"
                                            aria-describedby="password-addon" required>
                                        <button type="button" onclick="toggleShowPassword('password')"
                                            class="input-group-text border-0">
                                            <i id="toggleIcon" class="fas fa-eye-slash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="rememberMe" id="rememberMe"
                                        checked="">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                @error('email')
                                    <p class="text-danger text-center p-0 m-0">Kombinasi Email dan Password salah
                                    </p>
                                @enderror

                                <div class="text-center">
                                    <button type="submit" class="btn bg-dark w-100 mt-4 mb-0 text-white">Login</button>
                                </div>
                            </form>

                            <p class="mb-4 text-sm mt-4">
                                Belum memiliki akun ?
                                <a href="{{ route('register') }}"
                                    class="text-dark text-gradient font-weight-bold">Daftar di sini </a>
                            </p>
                            <p class="mb-4 text-sm">
                                Lupa Passoword ?
                                <a href="{{ route('password.request') }}"
                                    class="text-dark text-gradient font-weight-bold">Reset Password </a>
                            </p>
                            <p class="mb-4 text-sm">
                                <a href="{{ route('guest.dashboard') }}"
                                    class="text-dark text-gradient font-weight-bold">Kembali Ke Halaman Utama</a>
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
