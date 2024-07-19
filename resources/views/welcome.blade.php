<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Parfum</title>
    <link rel="icon" href="img/logo/logo2.jpeg">

    <!-- ==============LINK BOOSTREAP================== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- ==============LINK CSS================== -->
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container-fluid">
        <img class="logo" src="img/logo/logo2.png" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Jenis Parfum
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="category_pria">Parfum Pria</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="category_wanita">Parfum Wanita</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="access-control">Login</a>
                </li>

            </ul>
        </div>
    </div>
</nav>



<section id="hero" class="hero">
    <div class="hero-overlay"></div>
    <img class="imghero" src="img/bgeround/bg1.png" alt="">
    <div class="hero-content">
        <div data-aos="zoom-in">
            <h1>Welcome to Our Perfume Store</h1>
            <p>"Temukan keharuman yang dirancang khusus untuk Anda, dengan bahan-bahan eksklusif yang dipilih dengan cermat. Parfum ini menghadirkan aroma yang elegan dan memikat, memberikan sentuhan kemewahan dalam setiap semprotan. Cocok untuk momen-momen istimewa dan hari-hari biasa, parfum ini memastikan Anda selalu tampil percaya diri dan penuh pesona."</p>

        </div>
    </div>
</section>

<section id="box" class="box">
    <div class="container">
        <h2 class="section-title">Our Perfumes</h2>
        <div class="row">
            <?php
            include '../database/config.php'; // Menghubungkan ke file konfigurasi database

            $sql = "SELECT * FROM parfum"; // Query SQL untuk mengambil data parfum
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Loop melalui setiap baris hasil query
            while ($row = $result->fetch_assoc()) {
                // Ambil data parfum dari setiap baris
                $nama_parfum = $row["nama_parfum"];
                $harga = $row["harga"];
                $gambar = $row["img"];
                ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card" data-aos="fade-up">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($gambar); ?>" class="card-img-top" alt="<?php echo $nama_parfum; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $nama_parfum; ?></h5>
                        <p class="card-text">IDR <?php echo number_format($harga); ?></p>
                        <a href="detail?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Detail Produk</a> <!-- Tautan menuju detail parfum dengan ID sebagai parameter -->
                    </div>
                </div>
            </div>
                <?php
            }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </div>
</section>


<footer>
    <div class="container text-center">
        <div class="footer-logo">
            <img src="img/logo/logo2.png" alt="Logo">
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
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000 // Waktu dalam milidetik
    });
</script>
</body>

</html>
