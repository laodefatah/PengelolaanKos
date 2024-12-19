@extends('layout.index', ['title' => 'Daftar Transaksi'])

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Transaksi</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ url('/transaksi/create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Penghuni</th>
                <th>Kamar</th>
                <th>Jumlah Pembayaran</th>
                <th>Tanggal Transaksi</th>
                <th>Status Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->penghuni->nama }}</td>
                    <td>{{ $item->kamar->no_kamar }}</td>
                    <td>{{ number_format($item->jumlah_pembayaran, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_transaksi)->format('d M Y') }}</td>
                    <td>{{ $item->status_pembayaran }}</td>
                    <td>
                        <a href="{{ url('/transaksi/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('/transaksi/' . $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus transaksi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $transaksi->links() }}
</div>
@endsection
