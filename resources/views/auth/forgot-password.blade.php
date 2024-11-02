<x-auth-layout>
    <x-slot name="title">Lupa Password</x-slot>

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
                            <h3 class="font-weight-bolder text-dark text-gradient">Konfirmasi Email</h3>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">
                                Silahkan masukkan email anda, kami akan mengirimkan link untuk mereset
                                password anda
                            </p>

                            <form role="form" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <label class="mt-3">Email</label>
                                <div class="mb-1  ">
                                    <input name="email" id="email" type="text" class="form-control"
                                        placeholder="Email" aria-label="Email" aria-describedby="email-addon"
                                        value="{{ old('email') }}" required>
                                </div>
                                @error('email')
                                    <p class="text-danger text-center p-0 m-0">Email tidak ditemukan</p>
                                @enderror
                                <div class="text-center">
                                    <p id="countdown" class="my-2 text-primary text-gradient font-weight-bold"></p>
                                    <!-- Countdown display -->
                                    <button type="submit" id="submit-button"
                                        class="btn bg-dark w-100 mt-4 mb-0 text-white">Kirim
                                        Email Reset Password
                                    </button>
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