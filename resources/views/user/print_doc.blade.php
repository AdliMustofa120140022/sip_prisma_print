<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .invoice-container {
            width: 800px;
            min-height: 297mm;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
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
            <h2>INVOICE</h2>
            <p>Nomor : INV-<span class="highlight">[No. Invoice]</span></p>
        </div>

        <table class="details-table">
            <tr>
                <td class="from">Dari :</td>
                <td class="label">Kepada :</td>
                <td class="label">Nomor Pesana : </td>
                <td class="label">Tanggal Pesanan : </td>
            </tr>
            <tr>
                <td>
                    <p>Percetakan Prima Printing</p>
                    <p>Jl.Tabak No.09, Madukoro Kec. Kotabumi Utara,
                        Kab. Lampung Utara,
                        Lampung, 34552</p>
                </td>
                <td>
                    <p>[Nama Pemesan]</p>
                    <p>[Alamat Pemesan]</p>
                </td>
                <td>
                    <p>[Nomor Pesanan]</p>
                </td>
                <td>
                    <p>[Tanggal Pesanan]</p>
                </td>
            </tr>
        </table>

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
                        <td>1</td>
                        <td><span class="highlight">[Nama Produk]</span></td>
                        <td><span class="highlight">[Jumlah Produk]</span></td>
                        <td><span class="highlight">[Satuan Produk]</span></td>
                        <td><span class="highlight">[Harga Produk]</span></td>
                        <td><span class="highlight">[Jumlah x Harga]</span></td>
                    </tr>
                </tbody>
            </table>

        </div>

        <table class="summary">
            <tr>
                <td>Subtotal:</td>
                <td><span class="highlight">[Jumlah Produk]</span></td>
            </tr>
            <tr>
                <td>Biaya Pengiriman:</td>
                <td><span class="highlight">[Biaya Ongkir]</span></td>
            </tr>
            <tr>
                <td>Total Pembayaran:</td>
                <td><span class="highlight">[Total Pembayaran]</span></td>
            </tr>
        </table>

        <div class="payment-info">
            <table>
                <tr>
                    <td class="label">Metode Pembayaran:</td>
                    <td><span class="highlight">[Bank / Ewallet / QRIS]</span></td>
                </tr>
                <tr>
                    <td class="label">No. Rekening:</td>
                    <td><span class="highlight">[No. Rekening / No. Ewallet]</span></td>
                </tr>
                <tr>
                    <td class="label">Atas Nama:</td>
                    <td><span class="highlight">[Nama Penerima]</span></td>
                </tr>
                <tr>
                    <td class="label">Batas Pembayaran:</td>
                    <td><span class="highlight">[1x 24 jam dari tanggal pesanan]</span></td>
                </tr>
            </table>
            <p>Mohon upload bukti pembayaran Anda di halaman pembayaran untuk verifikasi.</p>
        </div>

        <div class="footer">
            <p>http://percekatnprimaprinting.com — Waktu Unduh: 06 Januari 2024 18:00 WIB</p>
        </div>
    </div>

</body>

</html>
