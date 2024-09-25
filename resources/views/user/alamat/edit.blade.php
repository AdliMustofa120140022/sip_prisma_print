<x-guest-layout>
    <x-slot name="title">
        buat alamat
    </x-slot>


    <div class=" w-full">
        <div class="flex gap-3 items-center">
            <a href="{{ url()->previous() }}">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Alamat Pengiriman</h2>
        </div>
        <div class=" max-w-5xl mx-auto p-3 border rounded-lg w-full bg-white shadow">
            {{-- <div class="max-w-2xl mx-auto p-6 bg-white shadow rounded-lg"> --}}
            <h2 class="text-xl text-center font-semibold mb-6">Tambah Alamat Pengiriman</h2>
            <form action="{{ route('user.alamat.update', $alamat->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Informasi Kontak -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Informasi Kontak</h3>
                    <label class="block mb-2 font-semibold text-gray-700">Nama Lengkap Penerima</label>
                    <input type="text" id="nama_penerima" name="nama_penerima" placeholder="Nama Lengkap Penerima"
                        value="{{ $alamat->nama_penerima }}"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 mb-4">

                    @error('nama_penerima')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <label class="block mb-2 font-semibold text-gray-700">Nomor WhatsApp</label>
                    <div class="flex mb-4">
                        <select class="p-3 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-blue-500">
                            <option>ID +62</option>
                        </select>
                        <input type="text" id="no_hp" name="no_hp" placeholder="Nomor WhatsApp"
                            value="{{ $alamat->no_hp }}"
                            class="w-full p-3 border border-gray-300 rounded-r-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    @error('no_hp')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Informasi Alamat -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Informasi Alamat</h3>


                    <label class="block mb-2 font-semibold text-gray-700">Provinsi</label>
                    <select id="provinsi" name="provinsi" onchange="getKabupaten()"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 mb-4">
                        <option value="{{ $alamat->provinsi }}" selected>{{ $alamat->provinsi }}</option>
                    </select>
                    @error('provinsi')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <label class="block mb-2 font-semibold text-gray-700">Kabupaten/Kota</label>
                    <select id="kabupaten" name="kabupaten" onchange="getKecamatan()"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 mb-4">
                        <option value="{{ $alamat->kabupaten }}" selected>{{ $alamat->kabupaten }}</option>
                    </select>
                    @error('kabupaten')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <label class="block mb-2 font-semibold text-gray-700">Kecamatan</label>
                    <select id="kecamatan" name="kecamatan" onchange="getKelurahan(); getPosCode()"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 mb-4">
                        <option value="{{ $alamat->kecamatan }}" selected>{{ $alamat->kecamatan }}</option>
                    </select>
                    @error('kecamatan')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <label class="block mb-2 font-semibold text-gray-700">Kelurahan</label>
                    <select id="kelurahan" name="kelurahan"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 mb-4">
                        <option value="{{ $alamat->kelurahan }}" selected>{{ $alamat->kelurahan }}</option>
                    </select>
                    @error('kelurahan')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <div x-data="{ selected: '', otherKodePos: '' }">
                        <label class="block mb-2 font-semibold text-gray-700">Kode pos</label>

                        <select id="pos_kode" name="kode_pos" x-model="selected"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 mb-4">
                            <option value="{{ $alamat->kode_pos }}" selected>{{ $alamat->kode_pos }}</option>
                            <option value="other">Other</option>
                        </select>

                        <!-- Input field appears when 'Other' is selected -->
                        <template x-if="selected === 'other'">
                            <input id="other_pos_kode" name="kode_pos" type="text" placeholder="Masukkan Kode Pos"
                                x-model="otherKodePos"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 mb-4" />
                        </template>

                    </div>
                    @error('kode_pos')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <label class="block mb-2 font-semibold text-gray-700">Alamat</label>
                    <textarea id="alamat" name="alamat" placeholder="Masukkan Alamat, Nama Jalan, No Rumah"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 mb-4">{{ $alamat->alamat }}</textarea>
                    @error('alamat')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <label class="block mb-2 font-semibold text-gray-700">Informasi Detail Lainnya</label>
                    <textarea name="catatan" placeholder="Masukkan detail lainnya (contoh: lantai, blok, informasi penunjuk arah lainnya)"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 mb-4">{{ $alamat->catatan }}</textarea>
                    @error('catatan')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tandai Sebagai -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Tandai Sebagai</h3>
                    <div x-data="{ selected: '{{ $alamat->label }}' }" class="flex space-x-4">
                        <!-- Radio Button for Kantor -->
                        <label :class="selected === 'kantor' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-600'"
                            class="px-6 py-2 rounded-lg cursor-pointer">
                            <input type="radio" name="label" value="kantor" checked={selected===kantor}
                                class="hidden" @click="selected = 'kantor'">
                            Kantor
                        </label>

                        <!-- Radio Button for Rumah -->
                        <label :class="selected === 'rumah' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-600'"
                            class="px-6 py-2 rounded-lg cursor-pointer">
                            <input type="radio" name="label" value="rumah" checked={selected===rumah}
                                class="hidden" @click="selected = 'rumah'">
                            Rumah
                        </label>
                        <!-- Radio Button for Rumah -->
                        <label
                            :class="selected === 'lainnya' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-600'"
                            class="px-6 py-2 rounded-lg cursor-pointer">
                            <input type="radio" name="label" value="lainnya" checked={selected===lainnya}
                                class="hidden" @click="selected = 'lainnya'">
                            Liannya
                        </label>
                    </div>
                    @error('label')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="mt-4 flex items-center">
                        <input name="is_default" type="checkbox" {{ $alamat->is_default === 1 ? 'checked' : '' }}
                            class="mr-2">
                        <label class="text-gray-700">Atur Sebagai Alamat Utama</label>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit"
                        class=" py-3 px-10 bg-blue-500 text-white rounded-lg font-semibold hover:bg-blue-600">Simpan</button>
                </div>

            </form>

        </div>
    </div>

    <x-slot name="scripts">
        <script>
            // Run the function when the window loads
            window.onload = function() {
                getProvinsi();
            };

            function getProvinsi() {
                let provinsi = document.getElementById('provinsi');
                fetch('https://alamat.thecloudalert.com/api/provinsi/get')
                    .then(response => response.json())
                    .then(data => {
                        provinsi.innerHTML += '<option value="">Pilih Provinsi</option>';
                        data.result.forEach(prov => {
                            provinsi.innerHTML +=
                                `<option value="${prov.text}" data-id="${prov.id}">${prov.text}</option>`;
                        });
                    })
                    .catch(error => console.error('Error fetching provinces:', error));
            }

            function getKabupaten() {
                let provinsiElement = document.getElementById('provinsi');
                let provinsiId = provinsiElement.options[provinsiElement.selectedIndex].dataset.id;
                let kabupaten = document.getElementById('kabupaten');
                kabupaten.innerHTML = '<option value="">Loading...</option>';

                fetch(`https://alamat.thecloudalert.com/api/kabkota/get/?d_provinsi_id=${provinsiId}`)
                    .then(response => response.json())
                    .then(data => {
                        kabupaten.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';
                        data.result.forEach(kota => {
                            kabupaten.innerHTML +=
                                `<option value="${kota.text}" data-id="${kota.id}">${kota.text}</option>`;
                        });
                    })
                    .catch(error => console.error('Error fetching kabupaten:', error));
            }

            function getKecamatan() {
                let kabupatenElement = document.getElementById('kabupaten');
                let kabupatenId = kabupatenElement.options[kabupatenElement.selectedIndex].dataset.id;
                let kecamatan = document.getElementById('kecamatan');
                kecamatan.innerHTML = '<option value="">Loading...</option>';

                fetch(`https://alamat.thecloudalert.com/api/kecamatan/get/?d_kabkota_id=${kabupatenId}`)
                    .then(response => response.json())
                    .then(data => {
                        kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        data.result.forEach(kec => {
                            kecamatan.innerHTML +=
                                `<option value="${kec.text}" data-id="${kec.id}">${kec.text}</option>`;
                        });
                    })
                    .catch(error => console.error('Error fetching kecamatan:', error));
            }

            function getKelurahan() {
                let kecamatanElement = document.getElementById('kecamatan');
                let kecamatanId = kecamatanElement.options[kecamatanElement.selectedIndex].dataset.id;
                let kelurahan = document.getElementById('kelurahan');
                kelurahan.innerHTML = '<option value="">Loading...</option>';

                fetch(`https://alamat.thecloudalert.com/api/kelurahan/get/?d_kecamatan_id=${kecamatanId}`)
                    .then(response => response.json())
                    .then(data => {
                        kelurahan.innerHTML = '<option value="">Pilih Kelurahan</option>';
                        data.result.forEach(kel => {
                            kelurahan.innerHTML +=
                                `<option value="${kel.text}" data-id="${kel.id}">${kel.text}</option>`;
                        });
                    })
                    .catch(error => console.error('Error fetching kelurahan:', error));
            }

            function getPosCode() {
                let kabupatenElement = document.getElementById('kabupaten');
                let kabupatenId = kabupatenElement.options[kabupatenElement.selectedIndex].dataset.id;
                let kecamatanElement = document.getElementById('kecamatan');
                let kecamatanId = kecamatanElement.options[kecamatanElement.selectedIndex].dataset.id;
                let postCode = document.getElementById('pos_kode');
                postCode.innerHTML = '<option value="">Loading...</option>';

                fetch(
                        `https://alamat.thecloudalert.com/api/kodepos/get/?d_kabkota_id=${kabupatenId}&d_kecamatan_id=${kecamatanId}`
                    )
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);

                        postCode.innerHTML = '<option value="">Pilih Kode Pos</option>';
                        if (data.result.length > 0) {
                            data.result.forEach(pos => {
                                postCode.innerHTML +=
                                    `<option value="${pos.text}" data-id="${pos.id}">${pos.text}</option>`;
                            });
                        }
                        postCode.innerHTML += '<option value="other">Other</option>';

                    })
                    .catch(error => console.error('Error fetching kelurahan:', error));
            }
        </script>

    </x-slot>

</x-guest-layout>
