<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero {
            background: url('/Amazing-House-in-Amazing-Place-HD-Wallpaper.jpg') center/cover no-repeat;
            color: white;
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .card img {
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }
        section {
            padding: 40px 0;
        }
        h1, h2 {
            font-weight: bold;
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">Kos Putri Family</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                 @auth
                <!-- Hanya tampil jika login -->
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">Logout</button>
                    </form>
                </li>
                @else
                <!-- Hanya tampil jika belum login -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Selamat Datang di Kos-Kosan Nyaman!</h1>
            <p>Temukan kamar kos yang sesuai dengan kebutuhan Anda.</p>
        </div>
    </section>

    <!-- Available Rooms Section -->
    <section class="mt-6">
        <div class="container">
            <h2 class="text-center mb-4">Kamar Kosong</h2>
            @if(session('alert'))
<script>
    alert('{{ session('alert') }}');
</script>
@endif
            <div class="row">
                @forelse ($kamars as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ $item->foto_url ?? asset('/assets/img/bg-404.jpeg') }}" class="card-img-top" alt="Foto Kamar">
                            <div class="card-body">
                                <h5 class="card-title">Kamar {{ $item->no_kamar }}</h5>
                                <p class="card-text">Tipe: {{ $item->tipe_kamar }}</p>
                                <p class="card-text">Harga: Rp {{ number_format($item->harga_per_bulan, 0, ',', '.') }} / bulan</p>
                                <p class="text-success">Status: {{ $item->status }}</p>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#transaksiModal" data-kamar-id="{{ $item->id }}">
                                    Sewa Kamar
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Maaf, saat ini tidak ada kamar kosong.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="transaksiModal" tabindex="-1" aria-labelledby="transaksiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transaksiModalLabel">Tambah Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/transaksi') }}" method="POST">
                        @csrf
                        <input type="hidden" name="kamar_id" id="modalKamarId">
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
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5 py-3 bg-light">
        <p>&copy; 2024 Putri Family. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const transaksiModal = document.getElementById('transaksiModal');
        transaksiModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const kamarId = button.getAttribute('data-kamar-id');
            const modalKamarIdInput = transaksiModal.querySelector('#modalKamarId');
            modalKamarIdInput.value = kamarId;
        });
    </script>
</body>
</html>
