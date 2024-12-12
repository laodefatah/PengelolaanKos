@extends('layout.index',['title'=> 'Tambah Data Penghuni Kos'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> Tambah Penghuni</h5>
            <form action="/pasien" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="nama">Nama Penghuni</label>
                    <input type="input" class="form-control @error('nama')is-invalid
                    @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder=" Masukkan Nama">
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="no_pasien">No Whatsapp</label>
                    <input type="input" class="form-control @error('no_pasien')is-invalid
                    @enderror" id="no_pasien" name="no_pasien" value="{{ old('no_pasien') }}" placeholder=" Masukkan No Pasien">
                    <span class="text-danger">{{ $errors->first('no_pasien') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="umur">Tanggal Masuk</label>
                    <input type="number" class="form-control @error('umur')is-invalid
                    @enderror"  id="umur" name="umur" value="{{ old('umur') }}" placeholder="Masukkan Umur">
                    <span class="text-danger">{{ $errors->first('umur') }}</span>
                 </div>
                <div class="form-group mt-1 mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="input" class="form-control @error('alamat')is-invalid
                    @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Alamat">
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                 </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
