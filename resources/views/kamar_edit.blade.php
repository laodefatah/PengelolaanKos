@extends('layout.index', ['title' => 'Edit Data Kamar'])

@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-10" style="margin-left: 250px;">
            <div class="card">
                <h5 class="class-title p-3">Edit Data Kamar: <b>{{ strtoupper($kamar->no_kamar) }}</b></h5>
                <form action="/kamar/{{ $kamar->id }}" method="POST">
                    @method('PUT')
                    @csrf

                    <!-- Input Nomor Kamar -->
                    <div class="form-group mt-1 mb-3">
                        <label for="no_kamar">Nomor Kamar</label>
                        <input 
                            type="text" 
                            class="form-control @error('no_kamar') is-invalid @enderror" 
                            id="no_kamar" 
                            name="no_kamar" 
                            value="{{ old('no_kamar', $kamar->no_kamar) }}" 
                            placeholder="Masukkan Nomor Kamar">
                        @error('no_kamar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Tipe Kamar -->
                    <div class="form-group mt-1 mb-3">
                        <label for="tipe_kamar">Tipe Kamar</label>
                        <input 
                            type="text" 
                            class="form-control @error('tipe_kamar') is-invalid @enderror" 
                            id="tipe_kamar" 
                            name="tipe_kamar" 
                            value="{{ old('tipe_kamar', $kamar->tipe_kamar) }}" 
                            placeholder="Masukkan Tipe Kamar (A-Z)">
                        @error('tipe_kamar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Harga Per Bulan -->
                    <div class="form-group mt-1 mb-3">
                        <label for="harga_per_bulan">Harga Per Bulan</label>
                        <input 
                            type="number" 
                            class="form-control @error('harga_per_bulan') is-invalid @enderror" 
                            id="harga_per_bulan" 
                            name="harga_per_bulan" 
                            value="{{ old('harga_per_bulan', $kamar->harga_per_bulan) }}" 
                            placeholder="Masukkan Harga Per Bulan">
                        @error('harga_per_bulan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Status -->
                    <div class="form-group mt-1 mb-3">
                        <label for="status">Status</label>
                        <select 
                            class="form-control @error('status') is-invalid @enderror" 
                            id="status" 
                            name="status">
                            <option value="" disabled>Pilih Status</option>
                            <option value="tersedia" {{ old('status', $kamar->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="terisi" {{ old('status', $kamar->status) == 'terisi' ? 'selected' : '' }}>Terisi</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol Submit -->
                    <div class="mt-4 text-end" style="margin-right: 950px;">
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
