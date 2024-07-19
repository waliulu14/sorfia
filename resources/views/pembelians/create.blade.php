<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css">
    <link rel="icon" href="{{ asset('img/logo/logo2.jpeg') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .card-custom {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .card-custom:hover {
            transform: scale(1.02);
        }
        .card-img {
            max-height: 250px;
            object-fit: cover;
        }
        .header-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
@include('partials.navbar')
<header class="page-header">
    <div class="container text-center">
        <h1 class="header-title">{{ $parfum->nama_parfum }}</h1>
    </div>
</header>
<div class="container mt-5">
    <h2>Form Pembelian</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card card-custom">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="data:image/jpeg;base64,{{ base64_encode($parfum->img) }}" class="img-fluid card-img" alt="{{ $parfum->nama_parfum }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <form id="pembelianForm">
                        @csrf
                        <input type="hidden" name="parfum_id" value="{{ $parfum->id }}">
                        <div class="mb-3">
                            <label for="parfum" class="form-label">Parfum</label>
                            <input type="text" id="parfum" class="form-control" value="{{ $parfum->nama_parfum }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga per unit</label>
                            <input type="text" id="harga" class="form-control" value="IDR {{ number_format($parfum->harga) }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Jumlah</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" oninput="calculateTotal()">
                        </div>
                        <div class="mb-3">
                            <label for="buyer_name" class="form-label">Nama Pembeli</label>
                            <input type="text" id="buyer_name" name="buyer_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="buyer_address" class="form-label">Alamat Pembeli</label>
                            <input type="text" id="buyer_address" name="buyer_address" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="buyer_phone" class="form-label">Nomor Telepon Pembeli</label>
                            <input type="text" id="buyer_phone" name="buyer_phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="total_price" class="form-label">Total Pembayaran</label>
                            <input type="text" id="total_price" class="form-control" readonly>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Beli</button>
                            <a href="{{ route("parfum.show", $parfum->id) }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
<script>
    function calculateTotal() {
        const harga = {{ $parfum->harga }};
        const quantity = document.getElementById('quantity').value;
        const totalPrice = harga * quantity;
        document.getElementById('total_price').value = 'IDR ' + totalPrice.toLocaleString();
    }

    document.getElementById('pembelianForm').addEventListener('submit', function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Processing...',
            text: 'Please wait while we process your order.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        const formData = new FormData(this);

        fetch('{{ route("pembelians.store") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
            .then(response => response.json())
            .then(data => {
                Swal.close();
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Pembelian Berhasil',
                        text: data.message,
                    }).then(() => {
                        window.location.href = '{{ route("parfum.show", $parfum->id) }}';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Pembelian Gagal',
                        text: data.message,
                    });
                }
            })
            .catch(error => {
                Swal.close();
                Swal.fire({
                    icon: 'error',
                    title: 'Pembelian Gagal',
                    text: 'Terjadi kesalahan, silakan coba lagi.',
                });
            });
    });
</script>
<br>
@include('partials.footer')
</body>
</html>
