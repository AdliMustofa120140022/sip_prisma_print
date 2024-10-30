<x-app-layout>
    <x-slot name="title">Produk</x-slot>

    <x-slot name="metas">
        {{-- datatables --}}
        <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
            integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    </x-slot>

    <section class="m-3">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="d-flex justify-content-between items-center">
                        <div class="card-header pb-0">
                            <h6>Produk</h6>
                        </div>
                        <div class="d-flex gap-2">

                            <button type="button" class="btn bg-gradient-primary mt-4 mb-0 px-5 text-white me-3"
                                data-bs-toggle="modal" data-bs-target="#modalAddKatagory">Tambah
                                Sub Kategori</button>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="dataTabel" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-info  font-weight-bolder opacity-7">NO</th>
                                        <th class="text-uppercase text-info   font-weight-bolder opacity-7 ps-2">Nama
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-info   font-weight-bolder opacity-7 ps-2">
                                            Kategori
                                        </th>
                                        <th class="text-info opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($sub_katagoris as $sub_katagori)
                                        <tr>
                                            <td>
                                                <p class=" ps-3 text-secondary  font-weight-bold">
                                                    {{ $loop->iteration }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class=" text-secondary  font-weight-bold">
                                                    {{ $sub_katagori->name ?? '-' }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class=" text-secondary text-center  font-weight-bold">
                                                    {{ $sub_katagori->katagori->nama ?? '-' }}
                                                </p>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex">

                                                    <button type="button"
                                                        class="text-secondary font-weight-bold text-decoration-underline pe-3 bg-transparent border-0"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalEdit{{ $sub_katagori->id }}">
                                                        Edit
                                                    </button>
                                                    <div class="modal fade" id="modalEdit{{ $sub_katagori->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="modalEditLabel{{ $sub_katagori->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-xl"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="modalEditLabel{{ $sub_katagori->id }}">
                                                                        Ubah Sub Katagori {{ $sub_katagori->name }}</h5>
                                                                    <button type="button" class="btn-close text-dark"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action={{ route('admin.sub-kategori.update', [$sub_katagori->id]) }}
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('put')

                                                                        <h6
                                                                            class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                                                                            Ubah data</h6>

                                                                        <div class="row mb-5">
                                                                            <div class="col-md-6 mb-3">
                                                                                <label for="name">Nama Sub
                                                                                    Katagor</label>
                                                                                <input name="name" id="name"
                                                                                    type="text" class="form-control"
                                                                                    placeholder="Nama Sub Katagori"
                                                                                    aria-label="name"
                                                                                    value="{{ $sub_katagori->name, old('name') }}">
                                                                                @error('name')
                                                                                    <p class="text-danger p-0 m-0">
                                                                                        {{ $message }}</p>
                                                                                @enderror

                                                                            </div>
                                                                            <div class="col-md-6 mb-3">
                                                                                <label
                                                                                    for="description">Deskirpsi</label>
                                                                                <textarea name="description" id="description" type="text" class="form-control" placeholder="Deskripsi"
                                                                                    aria-label="description">{{ $sub_katagori->description, old('description') }}</textarea>
                                                                                @error('description')
                                                                                    <p class="text-danger p-0 m-0">
                                                                                        {{ $message }}</p>
                                                                                @enderror

                                                                            </div>
                                                                            <div class="col-md-6 mb-3">
                                                                                <label
                                                                                    for="katagori_id">Katagori</label>
                                                                                <select name="katagori_id"
                                                                                    id="katagori_id"
                                                                                    class="form-control"
                                                                                    aria-label="katagori_id">
                                                                                    <option value="">Pilih
                                                                                        Katagori</option>
                                                                                    @foreach ($katagoris as $katagori)
                                                                                        <option
                                                                                            value="{{ $katagori->id }}"
                                                                                            {{ $sub_katagori->category_id == $katagori->id ? 'selected' : '' }}>
                                                                                            {{ $katagori->nama }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('katagori_id')
                                                                                    <p class="text-danger p-0 m-0">
                                                                                        {{ $message }}</p>
                                                                                @enderror
                                                                            </div>
                                                                            {{-- <div class="col-md-6 mb-3">
                                                                                <label for="image">Gambar</label>
                                                                                <input name="image" id="image"
                                                                                    type="file" class="form-control"
                                                                                    placeholder="Gambar"
                                                                                    aria-label="image">
                                                                                @error('image')
                                                                                    <p class="text-danger p-0 m-0">
                                                                                        {{ $message }}</p>
                                                                                @enderror
                                                                            </div> --}}


                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn bg-gradient-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn bg-gradient-primary">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <form
                                                        action="{{ route('admin.sub-kategori.destroy', [$sub_katagori->id]) }}"
                                                        method="POST" class="p-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="border-0 bg-transparent text-secondary font-weight-bold text-decoration-underline"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Hapus
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{-- <div class="d-flex justify-content-end px-3">
                                {{ $sub_katagoris->links() }}
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modalAddKatagory" tabindex="-1" role="dialog" aria-labelledby="modalAddKatagoryLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddKatagoryLabel">Tambah Sub Katagori</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action={{ route('admin.sub-kategori.store') }} method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Tambah data</h6>

                        <div class="row mb-5">
                            <div class="col-md-6 mb-3">
                                <label for="name">Nama Sub Katagori<span class="text-danger">*</span></label>
                                <input name="name" id="name" type="text" class="form-control"
                                    placeholder="Nama Sub Katagori" aria-label="name" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="description">Deskirpsi</label>
                                <textarea name="description" id="description" type="text" class="form-control" placeholder="Deskripsi"
                                    aria-label="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="katagori_id">Katagori<span class="text-danger">*</span></label>
                                <select name="katagori_id" id="katagori_id" class="form-control"
                                    aria-label="katagori_id">
                                    <option value="">Pilih Katagori</option>
                                    @foreach ($katagoris as $katagori)
                                        <option value="{{ $katagori->id }}">{{ $katagori->nama }}</option>
                                    @endforeach
                                </select>
                                @error('katagori_id')
                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                                @enderror

                            </div>
                            {{-- <div class="col-md-6 mb-3">
                                <label for="image">Gambar<span class="text-danger">*</span></label>
                                <input name="image" id="image" type="file" class="form-control"
                                    placeholder="Gambar" aria-label="image" value="{{ old('image') }}">
                                @error('image')
                                    <p class="text-danger p-0 m-0">{{ $message }}</p>
                                @enderror
                            </div> --}}


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <x-slot name='scripts'>
        <script>
            $(document).ready(function() {
                $('#dataTabel').DataTable();
            });


            const session = {!! json_encode($errors->all()) !!};
            const modals = {
                modalAdd: document.getElementById('modalAddKatagory'),
            };

            const errorConditions = [{
                    keyword: 'Nama',
                    modal: modals.modalAdd
                },
                {
                    keyword: 'Deskripsi',
                    modal: modals.modalAdd
                },
                {
                    keyword: 'Katagori',
                    modal: modals.modalAdd
                },
                {
                    keyword: 'Gambar',
                    modal: modals.modalAdd
                }
            ];

            console.log(session);

            if (session.length > 0) {
                const errorMessage = session[0];
                const condition = errorConditions.find(cond => errorMessage.includes(cond.keyword));
                const modalToShow = condition ? condition.modal : modals.modalAdd;
                new bootstrap.Modal(modalToShow).show();
            }
        </script>
    </x-slot>


</x-app-layout>
