@extends('layout.index', ['title' => 'Edit Data Penghuni'])
@section('content')
{{-- <main class="container">
    <div class="row"> --}}
        {{-- <div class="col-md-10" style="margin-left: 250px"> --}}
            <div class="card">
            <h5 class="class-title p-3">Edit Data Penghuni : <b>{{ strtoupper($penghuni->nama) }}</b></h5>
            <form action="/penghuni/{{ $penghuni->id }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="nama">Nama</label>
                    <input 
                        type="text" 
                        class="form-control @error('nama') is-invalid @enderror" 
                        id="nama" 
                        name="nama" 
                        value="{{ old('nama', $penghuni->nama) }}" 
                        placeholder="Masukkan Nama">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="no_whatsapp">Nomor Whatsapp</label>
                    <input 
                        type="text" 
                        class="form-control @error('no_whatsapp') is-invalid @enderror" 
                        id="no_whatsapp" 
                        name="no_whatsapp" 
                        value="{{ old('no_whatsapp', $penghuni->no_whatsapp) }}" 
                        placeholder="Masukkan Nomor Whatsapp">
                    @error('no_whatsapp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input 
                        type="date" 
                        class="form-control @error('tanggal_masuk') is-invalid @enderror" 
                        id="tanggal_masuk" 
                        name="tanggal_masuk" 
                        value="{{ old('tanggal_masuk', $penghuni->tanggal_masuk) }}" 
                        placeholder="Masukkan Tanggal Masuk">
                    @error('tanggal_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="tanggal_keluar">Tanggal Keluar</label>
                    <input 
                        type="date" 
                        class="form-control @error('tanggal_keluar') is-invalid @enderror" 
                        id="tanggal_keluar" 
                        name="tanggal_keluar" 
                        value="{{ old('tanggal_keluar', $penghuni->tanggal_keluar) }}" 
                        placeholder="Masukkan Tanggal Keluar">
                    @error('tanggal_keluar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4 text-end" style="margin-right: 950px">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
@endsection
