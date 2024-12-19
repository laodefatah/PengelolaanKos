@extends('layout.index', ['title' => 'Edit Transaksi'])

@section('content')
<div class="container">
    <h1>Edit Transaksi</h1>
    <form action="{{ url('/transaksi/' . $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mt-3">
            <label for="kamar_id">Kamar</label>
            <select name="kamar_id" id="kamar_id" class="form-control @error('kamar_id') is-invalid @enderror">
                @foreach($kamars as $kamar)
                    <option value="{{ $kamar->id }}" {{ $transaksi->kamar_id == $kamar->id ? 'selected' : '' }}>
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
                @foreach($penghunis as $penghuni)
                    <option value="{{ $penghuni->id }}" {{ $transaksi->penghuni_id == $penghuni->id ? 'selected' : '' }}>
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
            <input type="number" name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control @error('jumlah_pembayaran') is-invalid @enderror" value="{{ old('jumlah_pembayaran', $transaksi->jumlah_pembayaran) }}">
            @error('jumlah_pembayaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="tanggal_transaksi">Tanggal Transaksi</label>
            <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control @error('tanggal_transaksi') is-invalid @enderror" value="{{ old('tanggal_transaksi', $transaksi->tanggal_transaksi) }}">
            @error('tanggal_transaksi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="status_pembayaran">Status Pembayaran</label>
            <select name="status_pembayaran" id="status_pembayaran" class="form-control @error('status_pembayaran') is-invalid @enderror">
                <option value="Lunas" {{ $transaksi->status_pembayaran == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                <option value="Belum Lunas" {{ $transaksi->status_pembayaran == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
            </select>
            @error('status_pembayaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
    </form>
</div>
@endsection
