@extends('layout.index', ['title' => 'Tambah Data Penghuni Kos'])
@section('content')
<div class="card-body">
    <main class="container">
        <div class="row">
            <div class="col-md-10" style="margin-left: 200px">
                <div class="card">
                    <div class="card-header">
                                <h1 class="mb-4">Tambah Kamar</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/kamar') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="no_kamar" class="form-label">Nomor Kamar</label>
                <input type="text" class="form-control" id="no_kamar" name="no_kamar" value="{{ old('no_kamar') }}" required>
            </div>

            <div class="mb-3">
                <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                <input type="text" class="form-control" id="tipe_kamar" name="tipe_kamar" value="{{ old('tipe_kamar') }}" required
                pattern="[a-z]" title="Masukkan satu huruf kecil a-z">
            </div>

            <div class="mb-3">
                <label for="harga_per_bulan" class="form-label">Harga Per Bulan</label>
                <input type="number" class="form-control" id="harga_per_bulan" name="harga_per_bulan" value="{{ old('harga_per_bulan') }}" required>
            </div>

            {{-- <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="terisi" {{ old('status') == 'terisi' ? 'selected' : '' }}>Terisi</option>
                </select>
            </div> --}}

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/kamar" class="btn btn-primary mb-3">Batal</a>
        </form>
    </div>
    @endsection