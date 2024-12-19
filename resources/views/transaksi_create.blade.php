@extends('layout.index', ['title' => 'Tambah Transaksi'])

@section('content')
<div class="container">
    <h1>Tambah Transaksi</h1>
    <form action="{{ url('/transaksi') }}" method="POST">
        @csrf
        <div class="form-group mt-3">
            <label for="kamar_id">Kamar</label>
            <select name="kamar_id" id="kamar_id" class="form-control @error('kamar_id') is-invalid @enderror">
                <option value="">Pilih Kamar</option>
                @foreach($kamars as $kamar)
                    <option value="{{ $kamar->id }}" {{ old('kamar_id') == $kamar->id ? 'selected' : '' }}>
                        {{ $kamar->no_kamar }}
                    </option>
                @endforeach
            </select>
            @error('kamar_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="penghuni_id">Penghuni</label>
            <select name="penghuni_id" id="penghuni_id" class="form-control @error('penghuni_id') is-invalid @enderror">
                <option value="">Pilih Penghuni</option>
                @foreach($penghunis as $penghuni)
                    <option value="{{ $penghuni->id }}" {{ old('penghuni_id') == $penghuni->id ? 'selected' : '' }}>
                        {{ $penghuni->nama }}
                    </option>
                @endforeach
            </select>
            @error('penghuni_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="jumlah_pembayaran">Jumlah Pembayaran</label>
            <input type="number" name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control @error('jumlah_pembayaran') is-invalid @enderror" value="{{ old('jumlah_pembayaran') }}" placeholder="Masukkan jumlah pembayaran">
            @error('jumlah_pembayaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="tanggal_transaksi">Tanggal Transaksi</label>
            <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control @error('tanggal_transaksi') is-invalid @enderror" value="{{ old('tanggal_transaksi') }}">
            @error('tanggal_transaksi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="status_pembayaran">Status Pembayaran</label>
            <select name="status_pembayaran" id="status_pembayaran" class="form-control @error('status_pembayaran') is-invalid @enderror">
                <option value="">Pilih Status</option>
                <option value="Lunas" {{ old('status_pembayaran') == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                <option value="Belum Lunas" {{ old('status_pembayaran') == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
            </select>
            @error('status_pembayaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
