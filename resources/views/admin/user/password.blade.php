<button type="button" class="text-secondary font-weight-bold text-decoration-underline pe-3 bg-transparent border-0"
    data-bs-toggle="modal" data-bs-target="#modalPass{{ $user->id }}">
    Ubah Password
</button>


<div class="modal fade" id="modalPass{{ $user->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalPasslabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPasslabel{{ $user->id }}">Edit User</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container row justify-content-center ">
                    <!-- Informasi Transaksi -->
                    <div class="col-md-10">

                        <div class="card p-3">
                            <form action="{{ route('admin.user.update-pass', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')


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
                                @error('password')
                                    <p class="text-danger text-center p-0 m-0">{{ $message }}</p>
                                @enderror

                                <label>Password Konfirmasi</label>
                                <div class="mb-3">
                                    <div class="form-control d-flex justify-content-between align-items-center p-0">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control border-0" placeholder="password confirmation"
                                            aria-label="password_confirmation"
                                            aria-describedby="password_confirmation-addon" required>
                                        <button type="button" onclick="toggleShowPassword('password_confirmation')"
                                            class="input-group-text border-0">
                                            <i id="toggleIcon" class="fas fa-eye-slash"></i>
                                        </button>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                    <p class="text-danger text-center p-0 m-0">{{ $message }}</p>
                                @enderror


                                <button type="submit" class="btn btn-dark text-white">Simpan</button>
                            </form>

                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>
</div>
