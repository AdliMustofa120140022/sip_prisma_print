<button type="button" class="text-secondary font-weight-bold text-decoration-underline pe-3 bg-transparent border-0"
    data-bs-toggle="modal" data-bs-target="#modalEdit{{ $user->id }}">
    update
</button>


<div class="modal fade" id="modalEdit{{ $user->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalEditlabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditlabel{{ $user->id }}">Edit User</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container row justify-content-center ">
                    <!-- Informasi Transaksi -->
                    <div class="col-md-10">

                        <div class="card p-3">
                            <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')


                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $user->name }}">
                                </div>
                                @error('name')
                                    <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                                @enderror

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ $user->email }}">
                                </div>
                                @error('email')
                                    <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
                                @enderror

                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" id="role" class="form-select">
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User
                                        </option>
                                    </select>
                                </div>
                                @error('role')
                                    <span class="text-danger text-center p-0 m-0">{{ $message }}</span>
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
