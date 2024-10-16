<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>

    <!-- Scripts -->
    {{-- @vite(['resources/js/app.js']) --}}
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
            width: 100%;
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
            margin-top: 20px;
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
            <h2>SURAT PESANAN</h2>
            <p>Nomor : SP-{{ $transaksi->transaksi_code }}</p>
        </div>

        <table class="details-table">
            <tr>
                <td class="from">kepada YTH :</td>
            </tr>
            <tr>
                <td>
                    <p>{{ $transaksi->transaksi_data->alamat->nama_penerima }}</p>
                    <p>{{ $transaksi->transaksi_data->alamat->kelurahan }},
                        {{ $transaksi->transaksi_data->alamat->kecamatan }},
                        {{ $transaksi->transaksi_data->alamat->kabupaten }},
                        {{ $transaksi->transaksi_data->alamat->provinsi }},
                        {{ $transaksi->transaksi_data->alamat->kode_pos }} </p>
                </td>
            </tr>
        </table>

        <p>Bersama ini kami mengkonfirmasi pesanan Anda dengan rincian sebagai berikut :</p>
        <div class="purchase-details">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang / Jasa</th>
                        <th>Qty</th>
                        <th>Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
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
                                <td><span
                                        class="highlight">{{ $produk_transaksi->produck->data_produck->harga_satuan }}</span>
                                </td>
                                <td><span class="highlight">Rp.
                                        {{ number_format($produk_transaksi->produck->data_produck->harga_satuan * $produk_transaksi->jumlah, 0, ',', '.') }}</span>
                                </td>
                            @endforeach
                        @else
                            <td>1</td>
                            <td><span class="highlight">{{ $transaksi->costume_transaksi->product_name }}</span></td>
                            <td><span class="highlight">{{ $transaksi->costume_transaksi->order_quantity }}</span></td>
                            <td><span class="highlight">{{ $transaksi->costume_transaksi->unit ?? 'buah' }}</span></td>
                            <td><span class="highlight">
                                    {{ number_format($transaksi->costume_transaksi->harga, 0, ',', '.') }}</span></td>
                            <td><span class="highlight">
                                    {{ number_format($transaksi->costume_transaksi->harga, 0, ',', '.') }}</span></td>
                        @endif
                    </tr>
                </tbody>
            </table>

        </div>

        <table class="summary">
            <tr>
                <td>Subtotal:</td>
                <td><span class="highlight">Rp.
                        {{ number_format($transaksi->total_harga - $transaksi->transaksi_data->shiping_cost, 0, ',', '.') }}</span>
                </td>
            </tr>
            <tr>
                <td>Biaya Pengiriman:</td>
                <td><span class="highlight">Rp.
                        {{ number_format($transaksi->transaksi_data->shiping_cost, 0, ',', '.') }}</span></td>
            </tr>
            <tr>
                <td>Total Pembayaran:</td>
                <td><span class="highlight">Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span></td>
            </tr>
        </table>

        <div class="payment-info">
            <p>Pesanan Anda telah kami terima dan pembayaran telah dikonfirmasi melalui bukti pembayaran
                yang diunggah. Pesanan Anda akan segera diproses, dan kami akan menginformasikan
                pengiriman setelah pesanan siap.
            </p>
            <p>Mohon upload bukti pembayaran Anda di halaman pembayaran untuk verifikasi.</p>
        </div>

        <div class="footer-head">
            <p>Kotabumi Utara,
                {{ \Carbon\Carbon::parse($transaksi->transaksi_data->payment_time)->translatedFormat('d F Y H:i') }}
            </p>
            Hormat Kami,</p>

            <p> Percetakan Prima Printing</p>
        </div>

        <div class="footer">
            <p>http://percekatnprimaprinting.com — Waktu Unduh:
                {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i') }} WIB
            </p>
        </div>
    </div>

</body>

</html>
