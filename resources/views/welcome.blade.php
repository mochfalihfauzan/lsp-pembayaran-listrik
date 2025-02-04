<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Listrik Online - Bayar Listrik Mudah dan Cepat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .navbar {
            background: #007bff;
        }

        .navbar-brand,
        .nav-link {
            color: #fff !important;
        }

        .hero-section {
            background: linear-gradient(135deg, #007bff, #00ff88);
            color: #fff;
            padding: 100px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }

        .hero-section p {
            font-size: 1.2rem;
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 30px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .feature-icon {
            font-size: 3rem;
            color: #007bff;
            margin-bottom: 20px;
        }

        .testimonial-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
            text-align: center;
        }

        .testimonial-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .footer {
            background: #007bff;
            color: #fff;
            padding: 40px 0;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">BayarListrik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#features">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#how-it-works">Cara Kerja</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonials">Testimoni</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>

                    @if (Auth::check())
                        @if (Auth::user()->role == 'admin')
                            <li class="nav-item"><a class="nav-link text-primary" href="{{ route('dashboard-admin') }}">
                                    <div class="btn btn-success shadow">Dashboard</div>
                                </a></li>
                        @else
                            <li class="nav-item"><a class="nav-link text-primary" href="{{ route('dashboard-user') }}">
                                    <div class="btn btn-success shadow">Dashboard</div>
                                </a></li>
                        @endif
                    @else
                        <li class="nav-item"><a class="nav-link btn btn-light text-primary" href="{{ route('login') }}">
                                <div class="btn btn-success shadow">Login</div>
                            </a></li>

                    @endif

                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Bayar Listrik Online Mudah dan Cepat</h1>
            <p>Lakukan pembayaran tagihan listrik Anda kapan saja dan di mana saja. Aman, nyaman, dan terpercaya.</p>
            <a href="{{ route('register') }}" class="btn btn-primary">Daftar Sekarang</a>
        </div>
    </section>

    <!-- Fitur Layanan -->
    <section id="features" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Fitur Layanan Kami</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <i class="fas fa-bolt feature-icon"></i>
                    <h3>Pembayaran Instan</h3>
                    <p>Bayar tagihan listrik Anda dalam hitungan detik.</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-shield-alt feature-icon"></i>
                    <h3>Aman dan Terpercaya</h3>
                    <p>Keamanan data dan transaksi Anda terjamin.</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-mobile-alt feature-icon"></i>
                    <h3>Akses Mudah</h3>
                    <p>Gunakan aplikasi kami di smartphone atau desktop.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cara Kerja -->
    <section id="how-it-works" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-5">Cara Kerja</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <h3>1. Daftar/Login</h3>
                    <p>Buat akun atau login ke platform kami.</p>
                </div>
                <div class="col-md-4 text-center">
                    <h3>2. Masukkan ID Pelanggan</h3>
                    <p>Masukkan ID pelanggan listrik Anda.</p>
                </div>
                <div class="col-md-4 text-center">
                    <h3>3. Bayar Tagihan</h3>
                    <p>Lakukan pembayaran dengan metode pilihan Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section id="testimonials" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Apa Kata Pengguna?</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <img src="https://placehold.co/80" alt="User 1">
                        <h4>John Doe</h4>
                        <p>"Sangat mudah digunakan! Saya bisa bayar listrik tanpa ribet."</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <img src="https://placehold.co/80" alt="User 2">
                        <h4>Jane Smith</h4>
                        <p>"Transaksi cepat dan aman. Saya sangat puas!"</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <img src="https://placehold.co/80" alt="User 3">
                        <h4>Michael Lee</h4>
                        <p>"Aplikasi ini sangat membantu saya menghemat waktu."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>BayarListrik</h4>
                    <p>Jl. Contoh No. 123, Jakarta, Indonesia</p>
                    <p>Email: info@bayarlistrik.com</p>
                    <p>Telepon: +62 123 4567 890</p>
                </div>
                <div class="col-md-6 text-end">
                    <h4>Ikuti Kami</h4>
                    <a href="#" class="me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
