<x-guest-layout>
    <x-slot name="title">
        alamat
    </x-slot>


    <div class=" w-full">
        <div class="flex gap-3 items-center">
            <a href="{{ url()->previous() }}">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Check Out Pesanan</h2>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-md max-w-5xl mx-auto">
            {{-- conten --}}
            <a href="{{ route('user.alamat.create') }}"
                class="px-6 py-2 text-white bg-green-600 rounded-md  inline-flex justify-center items-center mb-6">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M14 6H10V2C10 1.46957 9.78929 0.960859 9.41421 0.585786C9.03914 0.210714 8.53043 0 8 0C7.46957 0 6.96086 0.210714 6.58579 0.585786C6.21071 0.960859 6 1.46957 6 2L6.071 6H2C1.46957 6 0.960859 6.21071 0.585786 6.58579C0.210714 6.96086 0 7.46957 0 8C0 8.53043 0.210714 9.03914 0.585786 9.41421C0.960859 9.78929 1.46957 10 2 10L6.071 9.929L6 14C6 14.5304 6.21071 15.0391 6.58579 15.4142C6.96086 15.7893 7.46957 16 8 16C8.53043 16 9.03914 15.7893 9.41421 15.4142C9.78929 15.0391 10 14.5304 10 14V9.929L14 10C14.5304 10 15.0391 9.78929 15.4142 9.41421C15.7893 9.03914 16 8.53043 16 8C16 7.46957 15.7893 6.96086 15.4142 6.58579C15.0391 6.21071 14.5304 6 14 6Z"
                        fill="white" />
                </svg>
                <span class="ml-2">Tambah Alamat</span>
            </a>

            @foreach ($alamats as $alamat)
                <div
                    class="mb-6 border rounded-lg flex justify-between p-3 {{ $alamat->is_default === 1 ? 'border-blue-300 border-2' : '' }}">
                    <div class="">
                        <h2 class="text-lg font-semibold">{{ $alamat->nama_penerima }}</h2>
                        {{-- <p class="text-gray-600">Aldi Mustafa</p> --}}
                        <p class="text-gray-600">{{ $alamat->no_hp }}</p>
                        <p class="text-gray-600">{{ $alamat->kelurahan }}, {{ $alamat->kecamatan }},
                            {{ $alamat->kabupaten }}, {{ $alamat->provinsi }}, {{ $alamat->kode_pos }}</p>
                        <p class="rounded-md px-2 text-white bg-blue-400 inline-block text-center">{{ $alamat->label }}
                        </p>
                    </div>
                    <div class="">
                        <a href="{{ route('user.alamat.edit', $alamat->id) }}" class="text-blue-500 block pb-2">Edit
                            Alamat</a>
                        <a href="{{ route('user.alamat.default', $alamat->id) }}"
                            class="text-blue-500 block pb-2">Pilih Jadi Alamat Utama</a>
                        <x-utils.btn-href text="Hapus" target:="{{ route('user.alamat.destroy', $alamat->id) }}"
                            class="bg-red-500 block" />
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</x-guest-layout>
