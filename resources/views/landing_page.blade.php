<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Hero Section Styling */
        .hero {
            background: url('/images/RobloxScreenShot20230212_153456581.png') center/cover no-repeat;
            color: white;
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        /* Card Image Styling */
        .card img {
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }
        /* Section Styling */
        section {
            padding: 40px 0;
        }
        h1, h2 {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Selamat Datang di Kos-Kosan Nyaman!</h1>
            <p>Temukan kamar kos yang sesuai dengan kebutuhan Anda.</p>
            <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
        </div>
    </section>

    <!-- Available Rooms Section -->
    <section class="mt-5">
        <div class="container">
            <h2 class="text-center mb-4">Kamar Kosong</h2>
            <div class="row">
                @forelse ($kamar as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <!-- Gambar Kamar -->
                            <img 
                                src="{{ $item->foto_url ?? asset('images/download (7).jpeg') }}" 
                                class="card-img-top" 
                                alt="Foto Kamar">
                            <div class="card-body">
                                <h5 class="card-title">Kamar {{ $item->no_kamar }}</h5>
                                <p class="card-text">Tipe: {{ $item->tipe_kamar }}</p>
                                <p class="card-text">Harga: Rp {{ number_format($item->harga_per_bulan, 0, ',', '.') }} / bulan</p>
                                <p class="text-success">Status: Tersedia</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Maaf, saat ini tidak ada kamar kosong.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center mt-5 py-3 bg-light">
        <p>&copy; 2024 Putri Family. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
