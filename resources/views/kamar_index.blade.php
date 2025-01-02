@extends('layout.index', ['title' => 'Data Kamar Kos'])

@section('content')
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title">Data Kamar Kos</h4>
        <a href="/kamar/create" class="btn btn-primary">Tambah Kamar</a>
    </div>
    <div class="card-body">
        <!-- Notifikasi -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Form Pencarian -->
        <form action="{{ url('/kamar') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Nomor atau Tipe Kamar..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <!-- Tabel -->
        <div class="table-responsive">
            <table id="basic-datatables" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Kamar</th>
                        <th>Tipe Kamar</th>
                        <th>Status</th>
                        <th>Harga per Bulan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kamar as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_kamar }}</td>
                            <td>{{ $item->tipe_kamar }}</td>
                            <td>
                                <span class="badge bg-{{ $item->status === 'tersedia' ? 'success' : 'danger' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td>Rp {{ number_format($item->harga_per_bulan, 0, ',', '.') }}</td>
                            <td>
                                <a href="/kamar/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/kamar/{{ $item->id }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data kamar.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="mt-3">
                {{ $kamar->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
