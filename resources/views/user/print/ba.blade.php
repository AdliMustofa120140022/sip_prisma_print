<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <style>
        @page {
            size: 210mm 280mm;
            /* Ukuran kertas F4 */
            margin: 0;
            /* Hilangkan margin untuk mengurangi efek header/footer */
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .invoice-container {
            width: 210mm;
            min-height: 280mm;
            padding: 20px;
            position: relative;
        }

        .header {
            display: flex;
            gap: 20px;
            justify-content: space-around;
            border-bottom: #000 2px solid;
        }

        .header img {
            width: 100px;
            height: 100px;
        }

        .header h1 {
            font-size: 24px;
            margin: 5px 0;
        }

        .header-cop {
            flex-grow: 1;
            justify-content: start;
        }

        .company-info {
            margin-bottom: 40px;
        }

        .company-info p {
            margin: 2px 0;
        }

        .invoice-info {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 40px;
        }

        .invoice-info h2 {
            font-size: 20px;
        }

        .details-table {
            width: 75%;
            margin-bottom: 20px;
        }

        .details-table td {
            padding: 0 10px;
        }

        .details-table .label {
            font-weight: bold;
            width: 150px;
        }

        .details-table .from {
            font-weight: bold;
            width: 180px;
        }

        .details-table td p {
            margin: 0;
        }

        .details-table td,
        .details-table th {
            vertical-align: top;
        }

        .purchase-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .purchase-details table,
        .purchase-details th,
        .purchase-details td {
            border: 1px solid #000;
        }

        .purchase-details th,
        .purchase-details td {
            padding: 10px;
            text-align: left;
        }

        .summary {
            width: 100%;
            text-align: right;
        }

        .summary td {
            padding: 10px;
        }

        .payment-info {
            margin-top: 20px;
        }

        .payment-info table {
            width: 100%;
            margin-top: 20px;
        }

        .payment-info td {
            padding: 10px;
        }

        .highlight {
            color: teal;
            font-weight: bold;
        }

        .footer-head {
            width: 100%;
            text-align: center
        }

        .footer-head p {
            margin: 40px 0;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            right: 30px;
            text-align: end;
            margin-top: 40px;
            font-size: 12px;
            color: #888;

        }
    </style>
</head>

<body>

    <div class="invoice-container">
        <div class="header">
            <img src="{{ asset('static/img/prima_logo.png') }}" alt="Logo">
            <div class="header-cop">
                <h1>PERCEKATAN PRIMA PRINTING</h1>
                <div class="company-info">
                    <p>Jl. Tabak No.09, Madukoro, Kec. Kotabumi Utara, Kabupaten Lampung Utara</p>
                    <p>Lampung, 34552, <span style="padding: 0 20px">Email: perc.primaprinting@gmail.com</span> Telp:
                        0812-7964-966</p>
                </div>
            </div>
        </div>

        <div class="invoice-info">
            <h2>BERITA ACATA SERAH TERIMA</h2>
            <p>Nomor : BAST-{{ $transaksi->transaksi_code }}</p>
        </div>

        <p>Pada hari ini, tanggal {{ $transaksi->transaksi_data->shiping_done_time ?? $transaksi->updated_at }}, telah
            dilakukan serah terima barang antara :</p>
        <p class="from">PIHAK PERTAMA</p>
        <table class="details-table">
            <tr>
                <td>Nama </td>
                <td>: NURWIYADI</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: Direktur</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: Percetakan Prima Printing, Jl. Tabak No.09, Madukoro, Kec. Kotabumi Utara,
                    Kabupaten Lampung Utara, Provinsi Lampung</td>
            </tr>

        </table>
        <p class="from">PIHAK KEDUA</p>
        <table class="details-table">
            <tr>
                <td>Nama </td>
                <td>: {{ $transaksi->transaksi_data->alamat->nama_penerima }}
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <p> : {{ $transaksi->transaksi_data->alamat->kelurahan }},
                        {{ $transaksi->transaksi_data->alamat->kecamatan }},
                        {{ $transaksi->transaksi_data->alamat->kabupaten }},
                        {{ $transaksi->transaksi_data->alamat->provinsi }},
                        {{ $transaksi->transaksi_data->alamat->kode_pos }} </p>
                </td>
            </tr>

        </table>

        <p>PIHAK PERTAMA menyerahkan hasil pesanan dan pengiriman barang kepada PIHAK KEDUA
            sehubungan dengan transaksi pembelian yang telah disepakati sebelumnya. PIHAK KEDUA
            menyatakan telah menerima barang tersebut dalam jumlah yang lengkap dan kondisi baik,
            sesuai dengan rincian berikut : </p>
        <div class="purchase-details">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang / Jasa</th>
                        <th>Qty</th>
                        <th>Satuan</th>
                        {{-- <th>Harga Satuan</th> --}}
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @if ($transaksi->tansaktion_type != 'costume')
                            @foreach ($transaksi->produk_transaksi as $produk_transaksi)
                                <td>1</td>
                                <td><span class="highlight">{{ $produk_transaksi->produck->name }}</span></td>
                                <td><span class="highlight">{{ $produk_transaksi->jumlah }}</span></td>
                                <td><span
                                        class="highlight">{{ $produk_transaksi->produck->data_produck->satuan ?? 'buah' }}</span>
                                </td>
                                {{-- <td><span
                                        class="highlight">{{ $produk_transaksi->produck->data_produck->harga_satuan }}</span>
                                </td> --}}
                                <td><span class="highlight">Diterima dalam kondisi lengkap dan baik</span>
                                </td>
                            @endforeach
                        @else
                            <td>1</td>
                            <td><span class="highlight">{{ $transaksi->costume_transaksi->product_name }}</span></td>
                            <td><span class="highlight">{{ $transaksi->costume_transaksi->order_quantity }}</span></td>
                            <td><span class="highlight">{{ $transaksi->costume_transaksi->unit ?? 'buah' }}</span></td>
                            {{-- <td><span class="highlight">
                                    {{ number_format($transaksi->costume_transaksi->harga, 0, ',', '.') }}</span></td> --}}
                            <td><span class="highlight">Diterima dalam kondisi lengkap dan baik</span></td>
                        @endif
                    </tr>
                </tbody>
            </table>

        </div>


        <div class="payment-info">
            <p>Dengan ditandatanganinya berita acara ini, kedua belah pihak sepakat bahwa seluruh barang
                yang diserahkan telah sesuai dengan pesanan dan dalam kondisi yang baik
            </p>
            <p>Demikian berita acara serah terima ini dibuat dengan sebenar-benarnya untuk digunakan
                sebagaimana mestinya.</p>
        </div>

        <table class="footer-head">
            <tr>
                <td>
                    <p>PIHAK KEDUA</p>
                    <br>
                    <p>{{ $transaksi->transaksi_data->alamat->nama_penerima }}</p>
                </td>
                <td>
                    <p>PIHAK PERTAMA</p>
                    DTO<br>
                    <p>NURWIYADI</p>
                </td>
            </tr>

        </table>

        <div class="footer">
            <p>http://percekatnprimaprinting.com — Waktu Unduh:
                {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i') }} WIB
            </p>
        </div>
    </div>

</body>

</html>
