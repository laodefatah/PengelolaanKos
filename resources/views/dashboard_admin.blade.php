@extends('layout.index', ['title' => 'Dashboard Admin'])

@section('content')
{{-- @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif --}}

<div class="row">
    <!-- Card Jumlah Penghuni -->
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Jumlah Penghuni</div>
            <div class="card-body">
                <h5 class="card-title text-center">{{ $jumlahPenghuni }}</h5>
                <p class="card-text text-center">orang</p>
            </div>
        </div>
    </div>

    <!-- Card Kamar Tersedia -->
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">Kamar Tersedia</div>
            <div class="card-body">
                <h5 class="card-title text-center">{{ $kamarTersedia }}</h5>
                <p class="card-text text-center">Kamar</p>
            </div>
        </div>
    </div>
    
    <!-- Card Kamar Terisi -->
    <div class="col-md-4">
        <div class="card text-white bg-danger mb-3">
            <div class="card-header">Kamar Terisi</div>
            <div class="card-body">
                <h5 class="card-title text-center">{{ $kamarTerisi }}</h5>
                <p class="card-text text-center">Kamar</p>
            </div>
        </div>
    </div>
    
</div>
@endsection
