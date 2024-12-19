@extends('layout.index', ['title' => 'Laporan'])

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title">Laporan Kos</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Laporan Keuangan -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Laporan Keuangan</h5>
                    </div>
                    <div class="card-body">
                        <p>Total Pendapatan: <strong>Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</strong></p>
                        <p>Pendapatan Bulanan: <strong>Rp {{ number_format($pendapatanBulanan, 0, ',', '.') }}</strong></p>
                        <p>Penghuni Belum Membayar: <strong>{{ $belumBayar }}</strong></p>
                        <a href="/laporan/keuangan" class="btn btn-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <!-- Laporan Penghuni -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Laporan Penghuni</h5>
                    </div>
                    <div class="card-body">
                        <p>Jumlah Penghuni Aktif: <strong>{{ $penghuniAktif }}</strong></p>
                        <p>Jumlah Penghuni Keluar: <strong>{{ $penghuniKeluar }}</strong></p>
                        <a href="/laporan/penghuni" class="btn btn-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <!-- Laporan Kamar -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Laporan Kamar</h5>
                    </div>
                    <div class="card-body">
                        <p>Kamar Terisi: <strong>{{ $kamarTerisi }}</strong></p>
                        <p>Kamar Kosong: <strong>{{ $kamarKosong }}</strong></p>
                        <p>Rata-rata Waktu Tinggal: <strong>{{ $rataWaktuTinggal }} bulan</strong></p>
                        <a href="/laporan/kamar" class="btn btn-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
