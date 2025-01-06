<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection, WithHeadings, ShouldAutoSize
{

    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Fetch transaksi data with necessary relationships and filters
        $transaksis = Transaksi::with([
            'user',
            'transaksi_data.alamat',
            'transaksi_data.payment_metode',
            'costume_transaksi',
            'return_transaksi',
            'produk_transaksi.produck'
        ])
            ->where('status', 'selesai')
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->get();

        $data = new \Illuminate\Support\Collection();

        if ($transaksis->isEmpty()) {
            return collect([]);
        }

        foreach ($transaksis as $key => $transaksi) {
            // Ensure that all relationships are loaded and handle missing data
            $namaProduk = $transaksi->produk_transaksi->map(function ($produkTransaksi) {
                return $produkTransaksi->produck->name ?? 'N/A';
            })->implode(', ');


            $jumlahProduk = $transaksi->produk_transaksi->map(function ($produkTransaksi) {
                return $produkTransaksi->jumlah ?? 'N/A';
            })->implode(', ');

            if ($transaksi->tansaktion_type == 'costume') {
                $namaProduk = $transaksi->costume_transaksi->product_name ?? 'N/A';
                $subKategoryProduk = 'costume';
                $kategoryProduk = 'costume';
                $jumlahProduk = $transaksi->costume_transaksi->order_quantity ?? 'N/A';
            }

            $kategoryProduk = $transaksi->produk_transaksi->map(function ($produkTransaksi) {
                return $produkTransaksi->produck->sub_katagori->katagori->nama ?? 'N/A';
            })->implode(', ');

            $subKategoryProduk = $transaksi->produk_transaksi->map(function ($produkTransaksi) {
                return $produkTransaksi->produck->sub_katagori->name ?? 'N/A';
            })->implode(', ');

            $metodePembayaran = $transaksi->transaksi_data->payment_metode->name ?? 'N/A';
            $metodePengiriman = $transaksi->transaksi_data->metode_pengiriman ?? 'N/A';
            $alamat = $transaksi->transaksi_data->alamat->alamat ?? 'N/A';
            $kelurahan = $transaksi->transaksi_data->alamat->kelurahan ?? 'N/A';
            $kecamatan = $transaksi->transaksi_data->alamat->kecamatan ?? 'N/A';
            $kabupaten = $transaksi->transaksi_data->alamat->kabupaten ?? 'N/A';
            $provinsi = $transaksi->transaksi_data->alamat->provinsi ?? 'N/A';
            $nomorHp = $transaksi->transaksi_data->alamat->no_hp ?? 'N/A';
            $resi = $transaksi->transaksi_data->resi ?? 'N/A';
            $biayaPengiriman = $transaksi->transaksi_data->shiping_cost ?? 'N/A';

            // Logic to check if there is a return
            $returnStatus = $transaksi->return_transaksi ? 'Iya' : 'Tidak';

            // Prepare the data row
            $data->push([
                'No' => $key + 1,
                'Kode Transaksi' => $transaksi->transaksi_code,
                'Tipe transaksi' => $transaksi->tansaktion_type ?? 'N/A',
                'Nama Pembeli' => $transaksi->user->name ?? 'N/A',
                'Email Pembeli' => $transaksi->user->email ?? 'N/A',
                'Nama Produk' => $namaProduk,
                'Kategori Produk' => $kategoryProduk,
                'Sub Kategori produk' => $subKategoryProduk,
                'Jumlah Produk' => $jumlahProduk,
                'Harga Total' => $transaksi->total_harga ?? 'N/A',
                'Metode Pembayaran' => $metodePembayaran,
                'Metode Pengiriman' => $metodePengiriman,
                'Alamat Pengiriman' => $alamat,
                'Desa/Kelurahan' => $kelurahan,
                'Kecamatan' => $kecamatan,
                'Kota/Kabupaten' => $kabupaten,
                'Provinsi' => $provinsi,
                'nomor Hp' => $nomorHp,
                'Resi' => $resi,
                'Biaya Pengiriman' => $biayaPengiriman,
                'Return' => $returnStatus,
                'Waktu Pesan' => $transaksi->created_at->format('Y-m-d H:i:s'),
                'Waktu Selesai' => $transaksi->updated_at->format('Y-m-d H:i:s'),
            ]);
        }

        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode Transaksi',
            'Tipe transaksi',
            'Nama Pembeli',
            'Email Pembeli',
            'Nama Produk',
            'Kategori Produk',
            'Sub Kategori produk',
            'Jumlah Produk',
            'Harga Total',
            'Metode Pembayaran',
            'Metode Pengiriman',
            'Alamat Pengiriman',
            'Desa/Kelurahan',
            'Kecamatan',
            'Kota/Kabupaten',
            'Provinsi',
            'nomor Hp',
            'Resi',
            'Biaya Pengiriman',
            'Return',
            'Waktu Pesan',
            'Waktu Selesai',
        ];
    }
}
