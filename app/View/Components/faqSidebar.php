<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class faqSidebar extends Component
{

    public $menus;
    public $param;
    /**
     * Create a new component instance.
     */
    public function __construct($param)
    {
        $this->param = $param;
        $this->menus = [
            [
                "section" => "Pemesanan",
                "questions" => [
                    [
                        "question" => "Bagaimana cara melakukan pemesanan?",
                        "param" => "cara_pemesanan"
                    ],
                    [
                        "question" => "Apakah saya bisa melihat contoh produk sebelum memesan dalam jumlah besar?",
                        "param" => "contoh_produk"
                    ],
                    [
                        "question" => "Apakah saya bisa membuat desain sendiri untuk produk yang saya pesan?",
                        "param" => "desain_sendiri"
                    ]
                    // [
                    //     "question" => "Apakah ada diskon untuk pemesanan dalam jumlah besar?",
                    //     "param" => "diskon_jumlah_besar"
                    // ]
                ]
            ],
            [
                "section" => "Pembayaran",
                "questions" => [
                    [
                        "question" => "Apa saja metode pembayaran yang diterima?",
                        "param" => "metode_pembayaran"
                    ]
                ]
            ],
            [
                "section" => "Pengiriman",
                "questions" => [
                    [
                        "question" => "Berapa lama waktu yang dibutuhkan untuk proses cetak?",
                        "param" => "waktu_cetak"
                    ],
                    [
                        "question" => "Bagaimana cara melacak pesanan saya?",
                        "param" => "melacak_pesanan"
                    ],
                    [
                        "question" => "Apakah ada biaya pengiriman?",
                        "param" => "biaya_pengiriman"
                    ]
                ]
            ],
            [
                "section" => "Kebijakan & Garansi",
                "questions" => [
                    [
                        "question" => "Apakah ada garansi untuk produk cetakan?",
                        "param" => "garansi_cetakan"
                    ]
                ]
            ],
            [
                "section" => "Layanan Pelanggan",
                "questions" => [
                    [
                        "question" => "Bagaimana cara menghubungi layanan pelanggan?",
                        "param" => "hubungi_layanan_pelanggan"
                    ]
                ]
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.faq-sidebar');
    }
}
