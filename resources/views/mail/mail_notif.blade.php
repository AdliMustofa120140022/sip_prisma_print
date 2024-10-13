<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Dikirim</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        p {
            margin: 3px 0;
            padding: 0;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 20px;
            color: #ffffff;
        }
    </style>
</head>

<body
    style="margin: 0; padding: 0; width: 100%; word-break: break-word; -webkit-font-smoothing: antialiased; --bg-opacity: 1; background-color: #eceff1;">

    <div role="article" aria-roledescription="email" aria-label="Reset your Password" lang="en">
        <table style="font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; width: 100%;" width="100%"
            cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td align="center"
                    style="--bg-opacity: 1; background-color: #eceff1; font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif;">
                    <table class="sm-w-full" style="font-family: 'Montserrat',Arial,sans-serif; width: 600px;"
                        width="600" cellpadding="0" cellspacing="0" role="presentation">
                        <tr>
                            <td class="sm-py-32 sm-px-24"
                                style="font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; padding: 48px; text-align: center;"
                                align="center">
                                <a href=""
                                    style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle;">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" class="sm-px-24"
                                style="font-family: 'Montserrat',Arial,sans-serif; background-color: #597af3; border-radius: 20px;">
                                <table style="font-family: 'Montserrat',Arial,sans-serif; width: 100%;"
                                    width="100%; background-color: #597af3; border-radius: 20px;" cellpadding="0"
                                    cellspacing="0" role="presentation">
                                    <tr>
                                        <td class="sm-px-24"
                                            style=" --bg-opacity: 0.3;  background-color: #597af3; font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; font-size: 14px; line-height: 24px; padding-bottom: 40px; padding-top: 20px; border-radius: 20px 20px 0 0; text-align: center;">
                                            <span
                                                style="font-weight: 800; font-size: 32px; line-height: normal; margin-bottom: 0; color: #eceff1;">
                                                Transaksi {{ $transaksi->transaksi_code }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="sm-px-24"
                                            style="--bg-opacity: 1; transform: translateY(-20px); background-color: #ffffff;  border-radius: 20px 20px  20px 20px; font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; font-size: 14px; line-height: 24px; padding: 48px; text-align: left; --text-opacity: 1; color: #626262;"
                                            align="left">
                                            <p style="font-weight: 600; font-size: 18px; margin-bottom: 0;">Hey there,
                                            </p>

                                            <div style="margin: 0 0 24px;">
                                                <p>Halo, {{ $user->name }},</p>
                                                <p>Kami senang memberi tahu Anda bahwa transaksi Anda dengan nomor
                                                    <strong>{{ $transaksi->transaksi_code }}</strong>
                                                    @if ($transaksi->status == 'kirim')
                                                        telah dikirim pada
                                                        <strong>{{ \Carbon\Carbon::parse($transaksi->transaksi_data->shiping_time)->format('d M Y') }}</strong>.
                                                    @elseif ($transaksi->status == 'desain')
                                                        sedang dalam proses desain.
                                                    @elseif ($transaksi->status == 'selesai')
                                                        telah selesai. pada
                                                        <strong>{{ \Carbon\Carbon::parse($transaksi->updated_at)->format('d M Y') }}</strong>.
                                                    @endif
                                                </p>
                                                <p>Detail transaksi Anda adalah sebagai berikut:</p>
                                            </div>

                                            <table cellpadding="0" style="width: 100%;" cellspacing="0"
                                                role="presentation">

                                                <tr>
                                                    <th>Nama Produk</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                </tr>
                                                @if ($transaksi->tansaktion_type == 'costume')
                                                    <td>{{ $transaksi->costume_transaksi->product_name }}</td>
                                                    <td>{{ $transaksi->costume_transaksi->order_quantity }}</td>
                                                    <td>Rp
                                                        {{ number_format($transaksi->costume_transaksi->harga, 0, ',', '.') }}
                                                    </td>
                                                @else
                                                    @foreach ($transaksi->produk_transaksi as $produk_transaksi)
                                                        <tr>
                                                            <td>{{ $produk_transaksi->produck->name }}</td>
                                                            <td>{{ $produk_transaksi->jumlah }}</td>
                                                            <td>Rp
                                                                {{ number_format($produk_transaksi->produck->data_produck->harga_satuan * $produk_transaksi->jumlah, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                @endif
                                                <tr>
                                                    <td colspan="2" style="text-align: right;">
                                                        <strong>Biaya Pengiriman :</strong>
                                                    </td>
                                                    <td>Rp
                                                        {{ number_format($transaksi->transaksi_data->shiping_cost, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="text-align: right;">
                                                        <strong>Total:</strong>
                                                    </td>
                                                    <td>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                            </table>


                                            <table style="font-family: 'Montserrat',Arial,sans-serif;" cellpadding="0"
                                                cellspacing="0" role="presentation">
                                                <tr>
                                                    <td
                                                        style=" --bg-opacity: 1; background-color: #7367f0; padding: 10px 0 5px 0;  border-radius: 4px; font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif;">
                                                    </td>
                                                </tr>
                                            </table>

                                            <div style="margin: 24px 0 0 0; ">
                                                @if ($transaksi->status == 'desain')
                                                    <p>Silahkan Cek aplikasi kami untuk melihat desain yang telah kami
                                                        buat, dan konfirmasi desain tersebut
                                                        agar kami segera memproses pesanan Anda.
                                                    </p>
                                                @else
                                                    <p>Barang dikirim menggunakan jasa pengiriman :
                                                        <strong>{{ $transaksi->transaksi_data->metode_pengiriman }}</strong>
                                                    </p>
                                                    <p>Nomor resi :
                                                        <strong>{{ $transaksi->transaksi_data->resi }}</strong>
                                                    </p>

                                                    <p style="margin-bottom: 0">Alamat pengiriman:</p>
                                                    <p style="margin-left: 20px; margin-top: 0; padding: 0;">
                                                        {{ $transaksi->transaksi_data->alamat->nama_penerima }} -
                                                        {{ $transaksi->transaksi_data->alamat->no_hp }} -
                                                        {{ $transaksi->transaksi_data->alamat->kelurahan }},
                                                        {{ $transaksi->transaksi_data->alamat->kecamatan }},
                                                        {{ $transaksi->transaksi_data->alamat->kabupaten }},
                                                        {{ $transaksi->transaksi_data->alamat->provinsi }},
                                                        {{ $transaksi->transaksi_data->alamat->kode_pos }}</p>
                                                @endif

                                            </div>
                                            <table style="font-family: 'Montserrat',Arial,sans-serif; width: 100%;"
                                                width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                <tr>
                                                    <td
                                                        style="font-family: 'Montserrat',Arial,sans-serif; padding-top: 32px; padding-bottom: 32px;">
                                                        <div
                                                            style="--bg-opacity: 1; background-color: #eceff1; height: 1px; line-height: 1px;">
                                                            &zwnj;</div>
                                                    </td>
                                                </tr>
                                            </table>

                                            <div style="margin: 0 0 16px;">
                                                <p>Terima kasih atas kepercayaan Anda berbelanja di toko kami. Jika Anda
                                                    memiliki pertanyaan lebih lanjut,
                                                    jangan ragu untuk menghubungi tim dukungan kami.</p>


                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: 'Montserrat',Arial,sans-serif; height: 20px;"
                                            height="20">
                                            <div class="footer">
                                                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights
                                                    reserved.</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: 'Montserrat',Arial,sans-serif; height: 16px;"
                                            height="16">

                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-family: 'Montserrat',Arial,sans-serif; height: 20px;" height="20"></td>
                        </tr>
                        <tr>
                            <td style="font-family: 'Montserrat',Arial,sans-serif; height: 20px;" height="20"></td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
