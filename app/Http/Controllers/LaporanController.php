<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penghuni;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index() {
        $data = [
            'totalPendapatan' => Transaksi::sum('jumlah_pembayaran'),
            'pendapatanBulanan' => Transaksi::whereMonth('tanggal_transaksi', date('m'))
                                ->whereYear('tanggal_transaksi', date('Y'))
                                ->sum('jumlah_pembayaran'),
            'belumBayar' => Penghuni::doesntHave('transaksi')->count(),
            'penghuniAktif' => Penghuni::whereNull('tanggal_keluar')->count(),
            'penghuniKeluar' => Penghuni::whereNotNull('tanggal_keluar')->count(),
            'kamarTerisi' => Kamar::where('status', 'terisi')->count(),
            'kamarKosong' => Kamar::where('status', 'tersedia')->count(),
        ];

        return view('laporan_index', $data);
    }
    
}
