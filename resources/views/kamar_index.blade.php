@extends('layout.index')
@section('content')
<div class="card-body">
            <main class="container">
                <div class="row">
                    <div class="col-md-10" style="margin-left: 200px">
                        <div class="card">
                            <div class="card-header">
                    <div class="card-title">Data Kamar</div>
                </div>
                <div class="row">
    <h1>Daftar Kamar</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="/kamar/create" class="btn btn-primary mb-3">Tambah Kamar</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kamar</th>
                <th>Tipe Kamar</th>
                <th>Status</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kamar as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->no_kamar }}</td>
                    <td>{{ $item->tipe_kamar }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->harga_per_bulan }}</td>
                    <td>
                        <a href="/kamar/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/kamar/{{ $item->id }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $kamar->links() }}
</div>
    </div>
</div>
</div>
</div>
@endsection