<x-app-layout>
    <x-slot name="title">pembayaran</x-slot>
    <x-slot name="metas">

        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    </x-slot>

    <section class="m-3">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="d-flex justify-content-between items-center">
                        <div class="card-header pb-0">
                            <h6>Desain Produk</h6>
                        </div>

                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="container row ">
                            <!-- Informasi Transaksi -->
                            <div class="col-md-12">

                                <div class="card p-3">
                                    <h6 class="border-bottom pb-2 mb-3">Informasi Transaksi</h6>
                                    <div class="mb-2">
                                        <strong>ID Transaksi:</strong> {{ $transaksi->transaksi_code }}
                                    </div>
                                    <div class="mb-2">
                                        <strong>Tanggal Transaksi:</strong>
                                        {{ $transaksi->created_at->format('d M Y, H:i') }}
                                    </div>
                                    <div class="mb-2">
                                        <strong>Jumlah Pembayaran:</strong> Rp.
                                        {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                                    </div>
                                    <div class="mb-2">
                                        <strong>Metode Pembayaran:</strong>
                                        {{ $transaksi->transaksi_data->payment_metode->name }}
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12 mt-4">
                                <h6 class="border-bottom pb-2 mb-3">Detail Produk</h6>

                                <!-- Detail Produk -->
                                @foreach ($transaksi->produk_transaksi as $produk_transaksi)
                                    <div class="card p-3 mt-4">
                                        <h6 class=" pb-1 mb-1">Produk {{ $loop->iteration }}</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="border-bottom pb-1 mb-1 mt-sm-4 mt-md-0">Informasi Produk
                                                </h6>
                                                <div class="mb-2">
                                                    <strong>Katagori:</strong>
                                                    {{ $transaksi->tansaktion_type == 'costume' ? $transaksi->costume_transaksi->katagori->nama : $produk_transaksi->produck->sub_katagori->katagori->nama }}
                                                </div>
                                                <div class="mb-2">
                                                    <strong>Sub Katagori:</strong>
                                                    {{ $transaksi->tansaktion_type == 'costume' ? $transaksi->costume_transaksi->sub_katagori->name : $produk_transaksi->produck->sub_katagori->name }}
                                                </div>
                                                <div class="mb-2">
                                                    <strong>Produk:</strong>
                                                    {{ $transaksi->tansaktion_type == 'costume' ? $transaksi->costume_transaksi->product_name : $produk_transaksi->produck->name }}
                                                </div>
                                                <div class="mb-2">
                                                    <strong>Harga Satuan:</strong>
                                                    Rp.
                                                    @if ($transaksi->tansaktion_type == 'costume')
                                                        {{ number_format($transaksi->costume_transaksi->harga, 0, ',', '.') }}
                                                    @else
                                                        {{ number_format($produk_transaksi->produck->harga_satuan, 0, ',', '.') }}
                                                    @endif

                                                </div>
                                                <div class="mb-2">
                                                    <strong>Jumlah:</strong>
                                                    {{ $produk_transaksi->jumlah }}
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <h6 class="border-bottom pb-1 mb-1 mt-sm-4 mt-md-0">Dokumen Pendukung
                                                </h6>

                                                <div class="mb-2">
                                                    <strong>Dok:</strong>
                                                    @if ($produk_transaksi->doc_pendukung->doc)
                                                        <a href="{{ asset('storage/doc_pendukung/' . $produk_transaksi->doc_pendukung->doc) }}"
                                                            download class="inline-flex">
                                                            {{ $produk_transaksi->doc_pendukung->doc }}
                                                            <i class="fa-solid fa-download"></i>
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </div>
                                                <div class="mb-2">
                                                    <strong>Link Pendukung:</strong>
                                                    @if ($produk_transaksi->doc_pendukung->link)
                                                        <a href="{{ $produk_transaksi->doc_pendukung->link }}"
                                                            target="_blank" class="inline-flex">
                                                            {{ $produk_transaksi->doc_pendukung->link }}
                                                            <i class="fa-solid fa-link"></i>
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </div>
                                                <div class="mb-2">
                                                    <strong>Catatan :</strong>
                                                    <span
                                                        class="text-wrap">{{ $produk_transaksi->doc_pendukung->catatan ?? '-' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($produk_transaksi->desain_produk_transaksi)
                                            <h6 class="border-bottom pb-2 mb-3">Desain Produk</h6>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="card h-100">
                                                        <div class="card-header pb-0">
                                                            <h6>Desain</h6>
                                                        </div>
                                                        <div
                                                            class="card-body d-flex align-items-center justify-content-center">
                                                            <img src="{{ asset('storage/desain_produk/' . $produk_transaksi->desain_produk_transaksi->desain) }}"
                                                                class="img-fluid rounded shadow" style=""
                                                                alt="bukti pembayaran">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card p-3">
                                                        <div class="mb-2">
                                                            <strong>Desain Status:</strong>
                                                            @if ($produk_transaksi->desain_produk_transaksi->status == 'rejected')
                                                                <span class="badge bg-danger">Ditolak</span>
                                                            @elseif ($produk_transaksi->desain_produk_transaksi->status == 'pending')
                                                                <span class="badge bg-warning text-dark">Menunggu
                                                                    Konfirmasi</span>
                                                            @elseif($produk_transaksi->desain_produk_transaksi->status == 'approved')
                                                                <span class="badge bg-success">Disetujui</span>
                                                            @endif
                                                        </div>
                                                        <div class="mb-2">
                                                            <strong>Catatan :</strong>
                                                            {{ $produk_transaksi->desain_produk_transaksi->catatan ?? '-' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @php
                                            $isDesignApproved =
                                                $produk_transaksi->desain_produk_transaksi &&
                                                $produk_transaksi->desain_produk_transaksi->status === 'approved';

                                            $isReturnApproved =
                                                $produk_transaksi->transaksi->return_transaksi &&
                                                $produk_transaksi->transaksi->return_transaksi->status !== 'approved';
                                        @endphp

                                        @if (!$isDesignApproved || !$isReturnApproved)
                                            <form action="{{ route('admin.desain.add', $produk_transaksi->id) }}"
                                                class="mt-4" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <h6 class="border-bottom pb-2 mb-3">Upload Desain Produk</h6>
                                                <div class="mb-2">
                                                    <label for="desain_produk" class="form-label">Desain Produk</label>
                                                    <div class="col-span-2 space-y-4">
                                                        <input type="file" name="desain_produk" class="form-control">
                                                        <p class="text-muted text-xs mt-1">Maksimal ukuran file 300MB
                                                        </p>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn bg-dark text-white">upload</button>
                                            </form>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="scripts">
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @foreach ($transaksi->produk_transaksi as $produk_transaksi)
                    document.getElementById('docPendukung{{ $produk_transaksi->id }}').addEventListener('change',
                        function() {
                            const fileName = this.files[0] ? this.files[0].name : 'Pilih file';
                            document.getElementById('fileName{{ $produk_transaksi->id }}').textContent = fileName;
                        });
                @endforeach
            });
        </script>
    </x-slot>




</x-app-layout>
