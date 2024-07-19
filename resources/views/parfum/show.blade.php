<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Parfum</title>
    <link rel="icon" href="{{ asset('assets/img/logo/logo2.jpeg') }}">

    <!-- ==============LINK BOOTSTRAP================== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- ==============LINK CSS================== -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container-fluid">
        <img class="logo" src="{{ asset('assets/img/logo/logo2.png') }}" alt="Logo Toko Parfum">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('home') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Jenis Parfum
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('category_pria') }}">Parfum Pria</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ url('category_wanita') }}">Parfum Wanita</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ url('access-control') }}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="page-header">
    <div class="container text-center">
        <h1>{{ $parfum->nama_parfum }}</h1>
    </div>
</header>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="data:image/jpeg;base64,{{ base64_encode($parfum->img) }}" class="img-fluid" alt="{{ $parfum->nama_parfum }}">
        </div>
        <div class="col-md-6">
            <h2>{{ $parfum->nama_parfum }}</h2>
            <p>Description: {{ $parfum->deskripsi }}</p>
            <p>Price: Rp{{ number_format($parfum->harga, 2) }}</p>
            <!-- <a href="https://wa.me/6282199089968?text=Hallo%20mau%20pesan%20{{ urlencode($parfum->nama_parfum) }}" class="btn btn-primary">
                    Order via WhatsApp
                </a> -->
        </div>
    </div>
</div>

<footer>
    <div class="container text-center">
        <div class="footer-logo">
            <img src="{{ asset('assets/img/logo/logo2.png') }}" alt="Logo">
            <h4>Toko Parfum</h4>
        </div>

        <div class="footer-contact">
            <p>Jl. Kebun Cengkeh, Batu Merah, Kec. Sirimau, Kota Ambon, Maluku</p>
            <p>Email: info@tokoparfum.com</p>
            <p>No Telpon: +62 123 456 7890</p>
        </div>

        <br>
        <div class="footer-copy">
            <p>&copy; 2024 Toko Parfum. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
