@extends('layout.index', ['title' => 'Laporan Transaksi'])

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Filter Laporan</div>
        <div class="card-body">
            <form action="{{ url('/transaksi/laporan') }}" method="GET" class="row g-3">
                <div class="col-md-5">
                    <label for="start_date" class="form-label">Tanggal Mulai</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}" required>
                </div>
                <div class="col-md-5">
                    <label for="end_date" class="form-label">Tanggal Selesai</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </form>
        </div>
    </div>

    @if(isset($transaksi) && $transaksi->isNotEmpty())
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">Hasil Laporan</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Penghuni</th>
                                <th>Nama Kamar</th>
                                <th>Jumlah Pembayaran</th>
                                <th>Tanggal Transaksi</th>
                                <th>Status Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksi as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->penghuni->nama ?? '-' }}</td>
                                    <td>{{ $item->kamar->no_kamar ?? '-' }}</td>
                                    <td>Rp {{ number_format($item->jumlah_pembayaran, 0, ',', '.') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_transaksi)->format('d-m-Y') }}</td>
                                    <td>{{ $item->status_pembayaran }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <h5>Total Pemasukan: <strong>Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</strong></h5>
                </div>
            </div>
        </div>
    @elseif(isset($transaksi))
        <div class="alert alert-warning">Tidak ada data transaksi untuk rentang tanggal yang dipilih.</div>
    @endif
@endsection