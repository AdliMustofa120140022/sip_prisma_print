<button type="button" class="btn bg-gradient-primary mt-4 mb-0 px-5 text-white me-3" data-bs-toggle="modal"
    data-bs-target="#modalCreate">
    create
</button>


<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby=modelCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id=modelCreateLabel">Edit User</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container row justify-content-center ">
                    <!-- Informasi Transaksi -->
                    <div class="col-md-10">

                        <div class="card p-3">
                            <form action="{{ route('admin.user.store') }}" method="POST">
                                @csrf


                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Nama" value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                                @enderror

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                                @enderror

                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" id="role" class="form-select">
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User
                                        </option>
                                    </select>
                                </div>
                                @error('role')
                                    <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                                @enderror

                                <label>Password</label>
                                <div class="mb-3">
                                    <div class="form-control d-flex justify-content-between align-items-center p-0">
                                        <input type="password" name="password" id="password_create"
                                            class="form-control border-0" placeholder="Password" aria-label="Password"
                                            aria-describedby="password-addon" required>
                                        <button type="button" onclick="toggleShowPassword('password_create')"
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
                                        <input type="password" name="password_confirmation"
                                            id="password_confirmation_create" class="form-control border-0"
                                            placeholder="password confirmation" aria-label="password_confirmation"
                                            aria-describedby="password_confirmation-addon" required>
                                        <button type="button"
                                            onclick="toggleShowPassword('password_confirmation_create')"
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
