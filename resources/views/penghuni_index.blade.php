@extends('layout.index', ['title' => 'Data Penghuni Kos'])

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Data Penghuni Kos</h4>
            <a href="/penghuni/create" class="btn btn-primary">Tambah Penghuni</a>
        </div>
        <div class="card-body">
            <!-- Notifikasi -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Form Pencarian -->
            <form action="{{ url('/penghuni') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari Nama Penghuni..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>

            <!-- Tabel -->
            <div class="table-responsive">
                <table id="basic-datatables" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No WhatsApp</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Keluar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penghuni as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->no_whatsapp }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d M Y') }}</td>
                                <td>{{ $item->tanggal_keluar ? \Carbon\Carbon::parse($item->tanggal_keluar)->format('d M Y') : 'Belum Keluar' }}
                                </td>
                                <td>
                                    <a href="/penghuni/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="/penghuni/{{ $item->id }}" method="POST"
                                        style="display:inline-block;">
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
                                <td colspan="6" class="text-center">Tidak ada data penghuni.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- Pagination -->
                <div class="mt-3">
                    {{ $penghuni->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
