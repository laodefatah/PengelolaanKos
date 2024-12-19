@extends('layout.index', ['title' => 'Tambah Data Penghuni Kos'])

@section('content')
        <div class="card-body">
            <main class="container">
                <div class="row">
                    <div class="col-md-10" style="margin-left: 200px">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Tambah Penghuni</h5>
                                <form action="{{ route('penghuni.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama">Nama Penghuni</label>
                                        <input type="text" name="nama" id="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            value="{{ old('nama') }}" placeholder="Masukkan Nama">
                                        @error('nama')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="no_whatsapp">No WhatsApp</label>
                                        <input type="text" name="no_whatsapp" id="no_whatsapp"
                                            class="form-control @error('no_whatsapp') is-invalid @enderror"
                                            value="{{ old('no_whatsapp') }}" placeholder="Masukkan No WhatsApp">
                                        @error('no_whatsapp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_masuk">Tanggal Masuk</label>
                                        <input type="date" name="tanggal_masuk" id="tanggal_masuk"
                                            class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                            value="{{ old('tanggal_masuk') }}">
                                        @error('tanggal_masuk')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
@endsection
