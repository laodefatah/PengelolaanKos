@extends('layout.index', ['title' => 'Tambah Data Kamar'])

@section('content')
<main class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tambah Data Kamar</h5>
                </div>
                <div class="card-body">
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

                        <!-- Input Nomor Kamar -->
                        <div class="form-group mb-3">
                            <label for="no_kamar">Nomor Kamar</label>
                            <input 
                                type="text" 
                                class="form-control @error('no_kamar') is-invalid @enderror" 
                                id="no_kamar" 
                                name="no_kamar" 
                                value="{{ old('no_kamar') }}" 
                                placeholder="Masukkan Nomor Kamar">
                            @error('no_kamar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Tipe Kamar -->
                        <div class="form-group mb-3">
                            <label for="tipe_kamar">Tipe Kamar</label>
                            <input 
                                type="text" 
                                class="form-control @error('tipe_kamar') is-invalid @enderror" 
                                id="tipe_kamar" 
                                name="tipe_kamar" 
                                value="{{ old('tipe_kamar') }}" 
                                placeholder="Masukkan Tipe Kamar (A-Z)" 
                                pattern="[A-Z]" 
                                title="Masukkan satu huruf besar A-Z">
                            @error('tipe_kamar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Input Harga Per Bulan -->
                        <div class="form-group mb-3">
                            <label for="harga_per_bulan">Harga Per Bulan</label>
                            <input 
                                type="number" 
                                class="form-control @error('harga_per_bulan') is-invalid @enderror" 
                                id="harga_per_bulan" 
                                name="harga_per_bulan" 
                                value="{{ old('harga_per_bulan') }}" 
                                placeholder="Masukkan Harga Per Bulan">
                            @error('harga_per_bulan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol Submit -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/kamar" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
