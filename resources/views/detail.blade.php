<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Parfum</title>
    <link rel="icon" href="{{ asset('img/logo/logo2.jpeg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .description {
            text-align: justify;
        }
        .btn-price {
            display: inline-block;
            padding: 8px 16px;
            font-size: 1.2rem;
            font-weight: bold;
            color: #fff;
            background-color: #0d6efd;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-price:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>
<body>
@include('partials.navbar')

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
            <p class="description">{{ $parfum->deskripsi }}</p>
            <p><span class="btn btn-price">Harga: Rp{{ number_format($parfum->harga) }}</span></p>
            <a href="{{ route('pembelian.form', ['id' => $parfum->id]) }}" class="btn btn-primary mt-3">Beli</a>
        </div>
    </div>
</div>

<br>
<br>
<br>

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000
    });
</script>
</body>
</html>
