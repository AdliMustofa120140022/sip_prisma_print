<x-app-layout>
    <x-slot name="title">Benner Home</x-slot>
    <x-slot name="metas">

        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
        {{-- <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script> --}}
    </x-slot>

    <section class="m-3">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="d-flex justify-content-between items-center">
                        <div class="card-header pb-0">
                            <h6>Slider Home</h6>
                        </div>
                        <div class="d-flex gap-2">
                            {{-- @include('admin.payment_metode.craete') --}}

                        </div>

                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="dataTabel" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-info font-weight-bolder opacity-7">NO</th>
                                        <th class="text-uppercase text-info font-weight-bolder opacity-7 ps-2">Gambar
                                        </th>
                                        <th class="text-info opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($benner_homes as $benner_home)
                                        <tr>
                                            <td>
                                                <p class=" ps-3 text-secondary  font-weight-bold">
                                                    {{ $loop->iteration }}
                                                </p>
                                            </td>
                                            <td>
                                                @if ($benner_home->img)
                                                    <div class="w-50 mx-auto">

                                                        <img src="{{ asset('storage/benner/' . $benner_home->img) }}"
                                                            alt="" class="img-fluid rounded-2">
                                                    </div>
                                                @else
                                                    <div class="w-50 mx-auto">
                                                        <p class="">Belum ada Gambar terpasang</p>
                                                    </div>
                                                @endif
                                            </td>



                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    @include('admin.benner.edit')
                                                    <form action="{{ route('admin.benner.destroy', $benner_home->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-danger font-weight-bold text-decoration-underline pe-3 bg-transparent border-0">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="scripts">
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script>
            // $(document).ready(function() {
            //     $('#dataTabel').DataTable();
            // });


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


</x-app-layout>
