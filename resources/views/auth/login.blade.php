<x-auth-layout>
    <x-slot name="title">login</x-slot>

    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                                <p class="mb-0">Enter your email and password to sign in</p>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('login') }}" method="POST" role="form">
                                    @csrf
                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input name="email" id="email" type="text" class="form-control"
                                            placeholder="Email" aria-label="Email"
                                            aria-describedby="email-addon" value="{{ old('email') }}" required>
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <div class="form-control d-flex justify-content-between align-items-center p-0">
                                            <input type="password" name="password" id="password"
                                                class="form-control border-0" placeholder="Password"
                                                aria-label="Password" aria-describedby="password-addon" required>
                                            <button type="button" onclick="toggleShowPassword('password')"
                                                class="input-group-text border-0">
                                                <i id="toggleIcon" class="fas fa-eye-slash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="rememberMe"
                                            id="rememberMe" checked="">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    @error('email')
                                        <p class="text-danger text-center p-0 m-0">Kombinasi Email / NIK dan Password salah
                                        </p>
                                    @enderror

                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn bg-gradient-faded-info w-100 mt-4 mb-0 text-white">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Belum memiliki akun ?
                                    <a href="{{ route('register') }}"
                                        class="text-info text-gradient font-weight-bold">Dafatar di sini </a>
                                </p>
                                </form>
                            </div>
                            {{-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Don't have an account?
                                    <a href="javascript:;" class="text-info text-gradient font-weight-bold">Sign up</a>
                                </p>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
