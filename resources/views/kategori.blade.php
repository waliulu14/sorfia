<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Parfum</title>
    <link rel="icon" href="{{ asset('img/logo/logo2.jpeg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
@include('partials.navbar')

<section id="hero" class="hero">
    <div class="hero-overlay"></div>
    <img class="imghero" src="{{ asset('img/bgeround/bg1.png') }}" alt="">
    <div class="hero-content">
        <div data-aos="zoom-in">
            <h1>Welcome to Our Perfume Store</h1>
            <p>"Temukan keharuman yang dirancang khusus untuk Anda, dengan bahan-bahan eksklusif yang dipilih dengan cermat. Parfum ini menghadirkan aroma yang elegan dan memikat, memberikan sentuhan kemewahan dalam setiap semprotan. Cocok untuk momen-momen istimewa dan hari-hari biasa, parfum ini memastikan Anda selalu tampil percaya diri dan penuh pesona."</p>
        </div>
    </div>
</section>
<section id="box" class="box">
    <div class="container">
        <h2 class="section-title">Our Perfumes for Men</h2>
        <div class="row">
            @foreach($parfums as $parfum)
                @if($parfum->category === 'Pria') <!-- Assuming 'category' is the column name -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card" data-aos="fade-up">
                        <img src="data:image/jpeg;base64,{{ base64_encode($parfum->img) }}" class="card-img-top" alt="{{ $parfum->nama_parfum }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $parfum->nama_parfum }}</h5>
                            <p class="card-text">IDR {{ number_format($parfum->harga) }}</p>
                            <a href="{{ route('parfum.detail', $parfum->id) }}" class="btn btn-primary">Detail Product</a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

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
